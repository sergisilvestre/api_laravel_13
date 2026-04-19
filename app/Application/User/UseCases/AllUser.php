<?php

namespace App\Application\User\UseCases;

use App\Domain\User\Respositories\UserRepositoryInterface;

class AllUser
{
    public function __construct(
        private UserRepositoryInterface $repo
    ) {}

    public function execute()
    {        
        return $this->repo->all();
    }
}
