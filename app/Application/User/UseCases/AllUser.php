<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Infrastructure\Helpers\LogHelper;
use Illuminate\Container\Attributes\Log;

class AllUser
{
    public function __construct(
        private UserRepositoryInterface $repository,
    ) {}

    public function execute()
    {
        LogHelper::write('users', 'Fetching all users');

        return $this->repository->all()->map(fn($user) => new UserDto(
            id: $user->id,
            name: $user->name,
            email: $user->email
        ));
    }
}
