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
        logger()->info('Executing AllUser use case');
        
        return $this->repo->all();
    }
}
