<?php

namespace App\Application\UserVerification\Dto;

class UserVerificationDto
{
    public function __construct(
        public int $user_id,
        public string $token,
        public string $token_expires_at,
    ) {}
}
