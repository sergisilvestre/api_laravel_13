<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Application\User\UseCases\GenerateUniqueVerificationToken;
use App\Infrastructure\Helpers\LogHelper;

class FindUser
{
    /**
     * @param UserRepositoryInterface $repo
     */
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * @param int $id
     * @return UserDto
     */
    public function execute(int $id): UserDto
    {
        LogHelper::write('users', 'Finding user with ID: ' . $id);

        $item = $this->repository->find($id);

        return new UserDto(
            id: $item->id,
            name: $item->name,
            email: $item->email
        );
    }
}
