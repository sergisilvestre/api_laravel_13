<?php

namespace App\Application\UserVerification\UseCases;

use App\Helpers\StringHelper;
use App\Infrastructure\Helpers\LogHelper;
use App\Infrastructure\UserVerification\Persistence\Eloquent\UserVerificationRepository;

class GenerateUniqueVerificationToken
{
    public function __construct(private UserVerificationRepository $repository) {}

    public function execute(int $length = 255): string
    {
        LogHelper::write('users', 'Generating unique verification token');
        
        do {
            $token = StringHelper::random($length);
            $exists = $this->repository->tokenExists($token);
        } while ($exists);
        return $token;
    }
}
