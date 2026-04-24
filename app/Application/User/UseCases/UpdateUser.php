<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Application\User\UseCases\GenerateUniqueVerificationToken;

class UpdateUser
{
    /**
     * @param UserRepositoryInterface $repo
     */
    public function __construct(
        private UserRepositoryInterface $repo
    ) {}

    /**
     * @param array $data
     * @return UserDto
     */
    public function execute(array $data): UserDto
    {
        $item = $this->repo->update($data['id'], $data);
        
        return new UserDto(
            id:     $item->id,
            name:   $item->name,
            email:  $item->email
        );
    }
}
