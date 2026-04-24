<?php

namespace App\Api\V1\Controllers\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controller;
use Illuminate\Http\JsonResponse;
use App\Api\V1\Requests\Auth\LoginRequest;
use App\Api\V1\Requests\Auth\RegisterVerifyRequest;
use App\Application\User\UseCases\LoginUser;
use App\Domain\Auth\TokenGenerator;

class AuthController extends Controller
{
    public function __construct(
        private LoginUser $loginUser,
        private TokenGenerator $auth
    ) {}
    /**
     * Handle a login request to the application.
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        $token = $this->loginUser->execute($credentials);

        if (!$token) {
            return ApiResponse::error('Unauthorized', 401);
        }
        return ApiResponse::success($this->respondWithToken($token));
    }

    public function check(): JsonResponse
    {
        return ApiResponse::success(['message' => 'Authenticated']);
    }

    /**
     * Check if the user is authenticated.
     */
    protected function respondWithToken($token): array
    {
        return [
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => $this->auth->getTTL() * config('jwt.ttl')
        ];
    }

    /**
     * Log the user out (Invalidate the token).
     */
    public function logout(): JsonResponse
    {
        $this->auth->invalidate();
        return ApiResponse::success(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     */
    public function refresh(): JsonResponse
    {
        return ApiResponse::success($this->respondWithToken($this->auth->refresh()));
    }

    public function verify(RegisterVerifyRequest $request): JsonResponse
    {
        $this->auth->verifyEmail($request->input('token'));
        return ApiResponse::success(['message' => 'Email verified successfully']);
    }
}
