<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Application\UserVerification\UseCases\GenerateUniqueVerificationToken;
use App\Application\UserVerification\UseCases\StoreUserVerification;
use App\Infrastructure\Helpers\LogHelper;
use App\Infrastructure\UserVeritication\Persistence\Eloquent\UserVerificationRepositoryInterface;
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
        private StoreUserVerification $storeUserVerification,
    ) {}

    /**
     * @param array $data
     * @return UserDto
     */
    public function execute(array $data): UserDto
    {
        LogHelper::write('users', 'Storing new user with email: ' . $data['email']);

        $item = $this->userRepository->store($data);

        $this->storeUserVerification->execute(['user_id' => $item->id]);
        
        return new UserDto(
            id:     $item->id,
            name:   $item->name,
            email:  $item->email
        );
    }
}
