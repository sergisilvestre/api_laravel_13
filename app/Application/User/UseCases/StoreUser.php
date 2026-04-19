<?php

namespace App\Application\User\UseCases;

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
     * @return Model
     */
    public function execute(array $data): Model
    {
        return $this->repo->store($data);
    }
}
