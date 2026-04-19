<?php

class AllUser
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
    ) {}
}
