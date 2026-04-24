<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Helpers\StringHelper;
use App\Infrastructure\Helpers\LogHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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
        $data['verification_token'] = StringHelper::random(32);

        $item = $this->repo->store($data);
        
        return new UserDto(
            id:     $item->id,
            name:   $item->name,
            email:  $item->email
        );
    }
}
