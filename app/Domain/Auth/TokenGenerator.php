<?php

namespace App\Domain\Auth;

interface TokenGenerator
{
    public function generate(array $credentials): ?string;
    public function refresh(): string;
    public function invalidate(): void;
    public function getTTL(): int;
}
