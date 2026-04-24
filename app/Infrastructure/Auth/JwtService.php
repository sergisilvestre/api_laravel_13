<?php

namespace App\Infrastructure\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Domain\Auth\TokenGenerator;

class JwtService implements TokenGenerator
{
    public function generate(array $credentials): ?string
    {
        return JWTAuth::attempt($credentials);
    }

    public function refresh(): string
    {
        return JWTAuth::refresh();
    }

    public function invalidate(): void
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    }

    public function getTTL(): int
    {
        return JWTAuth::factory()->getTTL();
    }
}
