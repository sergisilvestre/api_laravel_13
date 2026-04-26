<?php

use App\Http\Middleware\JsonResponse;
use App\Http\Middleware\JwtMiddleware;
use App\Infrastructure\User\Console\RememberVerifyUserCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {

        // Middleware global API
        $middleware->api(append: [
            JsonResponse::class,
        ]);

        $middleware->alias([
            'json.response' => JsonResponse::class,
            'jwt'           => JwtMiddleware::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })

    ->withCommands([
        RememberVerifyUserCommand::class,
    ])
    
    ->create();
