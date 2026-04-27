<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Application\User\UseCases\GenerateUniqueVerificationToken;
use App\Infrastructure\Helpers\LogHelper;

class UpdateUser
{
    /**
     * @param UserRepositoryInterface $repository
     */
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * @param array $data
     * @return UserDto
     */
    public function execute(array $data): UserDto
    {
        LogHelper::write('users', 'Updating user with ID: ' . $data['id']);

        $item = $this->repository->update($data['id'], $data);

        return new UserDto(
            id: $item->id,
            name: $item->name,
            email: $item->email
        );
    }
}
