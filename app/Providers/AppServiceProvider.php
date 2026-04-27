<?php

namespace App\Providers;

use App\Domain\Auth\TokenGenerator;
use App\Domain\User\Entities\User;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Domain\UserVerification\Entities\UserVerification;
use App\Infrastructure\Auth\JwtService;
use App\Infrastructure\User\Observers\UserObserver;
use App\Infrastructure\User\Persistence\Eloquent\UserRepository;
use App\Infrastructure\UserVeritication\Persistence\Eloquent\Observers\UserVerificationObserver;
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
        UserVerification::observe(UserVerificationObserver::class);
    }

    /**
     * Get the service bindings for the application.
     *
     * @return array
     */
    private function bindings()
    {
        return [
            UserRepositoryInterface::class      => UserRepository::class,
            TokenGenerator::class               => JwtService::class,
        ];
    }
}
