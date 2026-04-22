<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;

class AllUser
{
    public function __construct(
        private UserRepositoryInterface $repo
    ) {}

    public function execute()
    {
        return $this->repo->all()->map(fn($user) => new UserDto(
            id: $user->id,
            name: $user->name,
            email: $user->email
        ));
    }
}
