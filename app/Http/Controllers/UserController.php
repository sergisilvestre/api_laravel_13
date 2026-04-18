<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Hello, World!',
            'users' => \App\Models\User::all()
        ]);
    }
}