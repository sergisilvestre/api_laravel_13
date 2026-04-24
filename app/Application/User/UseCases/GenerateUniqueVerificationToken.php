<?php

namespace App\Application\User\UseCases;

use App\Helpers\StringHelper;
use App\Infrastructure\User\Persistence\UserTokenChecker;

class GenerateUniqueVerificationToken
{
    public function __construct(private UserTokenChecker $checker) {}

    public function execute(int $length = 32): string
    {
        do {
            $token = StringHelper::random($length);
            $exists = $this->checker->exists($token);
            
        } while ($exists);
        return $token;
    }
}
