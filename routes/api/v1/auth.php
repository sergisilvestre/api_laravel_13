<?php

use App\Api\V1\Controllers\Auth\AuthController;
use App\Http\Middleware\GuestTokenAuth;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {

    Route::post('login', 'login');

    Route::middleware('auth:api')->group(function () {
        Route::get('check', 'check');
        Route::post('logout', 'logout');
    });
});
