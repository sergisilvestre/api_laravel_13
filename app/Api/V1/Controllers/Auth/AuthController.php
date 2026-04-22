<?php

namespace App\Api\V1\Controllers\Auth;

use App\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{


    public function generateToken()
    {
        $token = hash('sha256', Str::uuid());

        $expiresAt = now()->addMinutes(30);

        Cache::put(
            "guest_token:$token",
            [
                'type' => 'guest',
            ],
            $expiresAt
        );

        return response()->json([
            'token' => $token,
            'expires_at' => $expiresAt->toISOString(),
        ]);
    }


    public function checkToken()
    {
        return response()->json([
            'message' => 'Token is valid.'
        ]);
    }

    public function revokeToken(Request $request)
    {
        $token = $request->bearerToken();

        if (! $token) {
            return response()->json(['message' => 'Token required'], 400);
        }

        Cache::forget("guest_token:$token");

        return response()->json([
            'message' => 'Token revoked'
        ]);
    }
}
