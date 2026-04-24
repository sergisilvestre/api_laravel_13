<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            auth('api')->user();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Token inválido'
            ], 401);
        }

        return $next($request);
    }
}
