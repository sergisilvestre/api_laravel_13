<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Application\User\UseCases\GenerateUniqueVerificationToken;
use App\Infrastructure\Helpers\LogHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class StoreUser
{
    /**
     * @param UserRepositoryInterface $repo
     */
    public function __construct(
        private UserRepositoryInterface $repo,
        private GenerateUniqueVerificationToken $tokenGenerator
    ) {}

    /**
     * @param array $data
     * @return UserDto
     */
    public function execute(array $data): UserDto
    {
        // Generar un token único usando el nuevo use case
        $data['verification_token'] = $this->tokenGenerator->execute(32);

        $item = $this->repo->store($data);
        
        return new UserDto(
            id:     $item->id,
            name:   $item->name,
            email:  $item->email
        );
    }
}
