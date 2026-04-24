
<?php

use App\Api\V1\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::name('user.')->group(function () {

    Route::apiResource('user', UserController::class);

    Route::prefix('user')->group(function () {});
});
