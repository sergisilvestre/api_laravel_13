<?php

use App\Api\V1\Controllers\Auth\AuthController;
use App\Http\Middleware\GuestTokenAuth;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    
    Route::prefix('token')->controller(AuthController::class)->group(function () {

        Route::get('generate', 'generateToken');

        Route::middleware(GuestTokenAuth::class)->group(function () {

            Route::get('check', 'checkToken');
            Route::get('revoke', 'revokeToken');
        });
    });
});
