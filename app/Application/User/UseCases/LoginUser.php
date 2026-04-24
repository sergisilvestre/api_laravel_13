<?php

namespace App\Application\User\UseCases;

use App\Domain\Auth\TokenGenerator;
use App\Infrastructure\Helpers\LogHelper;

class LoginUser
{
    public function __construct(private TokenGenerator $auth) {}

    public function execute(array $credentials): ?string
    {
        LogHelper::write('users', 'Logging in user with email: ' . $credentials['email']);

        return $this->auth->generate($credentials);
    }
}
