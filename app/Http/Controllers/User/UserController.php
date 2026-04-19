<?php

namespace App\Http\Controllers\User;

use App\Application\User\UseCases\AllUser;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Application\User\UseCases\StoreUser;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AllUser $useCase)
    {
        return ApiResponse::success($useCase->execute());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, StoreUser $useCase)
    {
        return ApiResponse::success($useCase->execute($request->validated()));
    }
}