<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Application\User\UseCases\GenerateUniqueVerificationToken;

class FindUser
{
    /**
     * @param UserRepositoryInterface $repo
     */
    public function __construct(
        private UserRepositoryInterface $repo,
    ) {}

    /**
     * @param int $id
     * @return UserDto
     */
    public function execute(int $id): UserDto
    {
        $item = $this->repo->find($id);
        
        return new UserDto(
            id:     $item->id,
            name:   $item->name,
            email:  $item->email
        );
    }
}
