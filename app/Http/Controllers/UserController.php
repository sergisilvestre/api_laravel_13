<?php

namespace App\Http\Controllers;

use App\Application\User\UseCases\AllUser;
use App\Helpers\ApiResponse;

class UserController extends Controller
{
    public function index(AllUser $useCase)
    {
        return ApiResponse::success($useCase->execute());
    }
}