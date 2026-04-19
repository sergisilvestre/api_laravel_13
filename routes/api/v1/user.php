
<?php

use App\Api\V1\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('user', UserController::class);

Route::prefix('user')->group(function () {
    
});