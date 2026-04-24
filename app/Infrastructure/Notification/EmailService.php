<?php

namespace App\Infrastructure\Notification;

use App\Infrastructure\Helpers\LogHelper;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class EmailService
{
    public function sendWelcome(string $email, string $name): void
    {
        Mail::to($email)->send(new WelcomeEmail($name));

        LogHelper::write('users', ' Welcome email sent to: ' . $email);
    }
}
