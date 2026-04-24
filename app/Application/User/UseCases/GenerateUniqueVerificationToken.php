<?php

namespace App\Application\User\UseCases;

use App\Helpers\StringHelper;
use App\Infrastructure\User\Persistence\Eloquent\UserRepository;

class GenerateUniqueVerificationToken
{
    public function __construct(private UserRepository $userRepository) {}

    public function execute(int $length = 255): string
    {
        do {
            $token = StringHelper::random($length);
            $exists = $this->userRepository->tokenExists($token);
        } while ($exists);
        return $token;
    }
}
