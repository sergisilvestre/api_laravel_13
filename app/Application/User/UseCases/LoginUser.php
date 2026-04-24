<?php

namespace App\Application\User\UseCases;

use App\Domain\Auth\TokenGenerator;

class LoginUser
{
    public function __construct(private TokenGenerator $auth) {}

    public function execute(array $credentials): ?string
    {
        return $this->auth->generate($credentials);
    }
}
