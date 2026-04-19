<?php

namespace App\Infrastructure\Notification;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendWelcome(string $email): void
    {
        Mail::raw('Welcome!', function ($message) use ($email) {
            $message->to($email)
                ->subject('Welcome');
        });
    }
}
