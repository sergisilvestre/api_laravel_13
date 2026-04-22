<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class StoreUser
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
        $item = $this->repo->store($data);
        
        return new UserDto(
            id:     $item->id,
            name:   $item->name,
            email:  $item->email
        );
    }
}
