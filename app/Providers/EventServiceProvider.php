<?php

namespace App\Providers;

use App\Application\User\Listeners\SendWelcome;
use App\Domain\User\Events\UserCreated;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        parent::boot();

        $this->userEvents();
    }

    /**
     * Register user-related events and listeners.
     */
    private function userEvents(): void
    {
        Event::listen(UserCreated::class, SendWelcome::class);
    }
}
