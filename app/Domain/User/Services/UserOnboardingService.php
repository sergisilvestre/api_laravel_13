<?php

namespace App\Domain\User\Services;

use App\Infrastructure\Helpers\LogHelper;
use App\Infrastructure\Notification\EmailService;

class UserOnboardingService
{
    public function __construct(
        private EmailService $email
    ) {}


    public function onboard(string $email, string $name): void
    {
        LogHelper::write('users', 'Onboarding user: ' . $email);
        
        $this->email->sendWelcome($email, $name);
    }
}
