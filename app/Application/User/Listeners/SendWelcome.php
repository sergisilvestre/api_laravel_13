<?php

namespace App\Application\User\Listeners;

use App\Domain\User\Events\UserCreated;
use App\Domain\User\Services\UserOnboardingService;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcome implements ShouldQueue
{
    public function __construct(
        private UserOnboardingService $service
    ) {
    }

    public function handle(UserCreated $event): void
    {
        $this->service->onboard($event->email, $event->name);
    }
}
