<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Application\UserVerification\UseCases\GenerateUniqueVerificationToken;
use App\Infrastructure\Helpers\LogHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class StoreUser
{
    /**
     * @param UserRepositoryInterface $userRepository
     * @param UserVerificationRepositoryInterface $userVerificationRepository
     */
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private UserVerificationRepositoryInterface $userVerificationRepository,
    ) {}

    /**
     * @param array $data
     * @return UserDto
     */
    public function execute(array $data): UserDto
    {
        LogHelper::write('users', 'Storing new user with email: ' . $data['email']);

        $item = $this->userRepository->store($data);

        $this->userVerificationRepository->store(['user_id' => $item->id]);
        
        return new UserDto(
            id:     $item->id,
            name:   $item->name,
            email:  $item->email
        );
    }
}
