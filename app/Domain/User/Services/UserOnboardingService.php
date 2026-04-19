<?php

namespace App\Domain\User\Services;

use App\Infrastructure\Notification\EmailService;

class UserOnboardingService
{
    public function __construct(
        private EmailService $email
    ) {}


    public function onboard(string $email): void
    {
        $this->email->sendWelcome($email);
    }
}
