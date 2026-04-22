<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GuestTokenAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (! $token) {
            return response()->json(['message' => 'Token required'], 401);
        }

        $data = Cache::get("guest_token:$token");

        if (! $data) {
            return response()->json(['message' => 'Token invalid or expired'], 401);
        }

        // optional: inject data into request
        $request->merge(['auth_type' => $data['type']]);

        return $next($request);
    }
}
