<?php

namespace App\Application\User\Listeners;

use App\Domain\User\Events\UserCreated;
use App\Domain\User\Services\UserOnboardingService;
use App\Infrastructure\Helpers\LogHelper;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcome implements ShouldQueue
{
    public function __construct(
        private UserOnboardingService $service
    ) {}

    public function handle(UserCreated $event): void
    {
        LogHelper::write('users', 'Handling UserCreated event for: ' . $event->email);

        $this->service->onboard($event->email, $event->name, $event->verification_token);
    }
}
