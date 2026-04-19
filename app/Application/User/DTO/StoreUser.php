<?php

namespace App\Application\User\DTO;

class StoreUser
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
    ) {}
}
