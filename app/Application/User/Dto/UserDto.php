<?php

namespace App\Application\User\Dto;

class UserDto
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
    ) {}
}
