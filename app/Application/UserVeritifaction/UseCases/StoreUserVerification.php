<?php

namespace App\Application\UserVerification\UseCases;

use App\Application\UserVerification\Dto\UserVerificationDto;
use App\Infrastructure\Helpers\LogHelper;
use App\Infrastructure\UserVerification\Persistence\Eloquent\UserVerificationRepository;

class StoreUserVerification
{
    public function __construct(
        private UserVerificationRepository $repository,
        private GenerateUniqueVerificationToken $token,
        ) {}

    public function execute(array $data): UserVerificationDto
    {
        LogHelper::write('users', 'Storing user verification for user ID: ' . $data['user_id']);

        $token = $this->token->execute();
        
        $item = $this->repository->store([
            'user_id'           => $data['user_id'],
            'token'             => $token,
            'token_expires_at'  => config('user.verification.token_expiration_hours'),
        ]);

        return new UserVerificationDto(
            user_id: $item->user_id,
            token: $item->token,
            token_expires_at: $item->token_expires_at,
        );
    }
}
