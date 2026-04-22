<?php

namespace App\Api\V1\Controllers\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Handle a login request to the application.
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {

            return ApiResponse::error('Unauthorized', 401);
        }

        return ApiResponse::success($this->respondWithToken($token));
    }

    /**
     * Check if the user is authenticated.
     */
    protected function respondWithToken($token): array
    {
        return [
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => JWTAuth::factory()->getTTL() * config('jwt.ttl')
        ];
    }

    /**
     * Log the user out (Invalidate the token).
     */
    public function logout(): JsonResponse
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return ApiResponse::success(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     */
    public function refresh(): JsonResponse
    {
        return ApiResponse::success($this->respondWithToken(JWTAuth::refresh()));
    }
}
