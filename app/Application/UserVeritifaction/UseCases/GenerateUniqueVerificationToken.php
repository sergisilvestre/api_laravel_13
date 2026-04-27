<?php

namespace App\Application\UserVerification\UseCases;

use App\Helpers\StringHelper;
use App\Infrastructure\Helpers\LogHelper;

class GenerateUniqueVerificationToken
{
    public function __construct(private UserVerificationRepository $userVerificationRepository) {}

    public function execute(int $length = 255): string
    {
        LogHelper::write('users', 'Generating unique verification token');
        
        do {
            $token = StringHelper::random($length);
            $exists = $this->userVerificationRepository->tokenExists($token);
        } while ($exists);
        return $token;
    }
}
