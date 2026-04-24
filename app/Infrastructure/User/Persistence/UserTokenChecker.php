<?php

namespace App\Infrastructure\User\Persistence;

use App\Domain\User\Entities\User;

class UserTokenChecker
{
    public function exists(string $token): bool
    {
        return User::where('verification_token', $token)->exists();
    }
}
