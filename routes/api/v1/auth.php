<?php

use App\Api\V1\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function () {

    Route::post('login',    'login')->name('login');
    Route::get('verify',    'verify')->name('verify');

    Route::middleware('jwt')->group(function () {

        Route::get('check',     'check')->name('check');
        Route::post('logout',   'logout')->name('logout');
    });
});
