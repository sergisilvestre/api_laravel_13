<?php

namespace App\Providers;

use App\Domain\User\Entities\User;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Infrastructure\User\Observers\UserObserver;
use App\Infrastructure\User\Persistence\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->bindings() as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }

    private function bindings()
    {
        return [
            UserRepositoryInterface::class => UserRepository::class,
        ];
    }
}
