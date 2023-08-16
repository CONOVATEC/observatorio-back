<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next)
    {
        $token=$request->bearerToken();
        if(!$token){
            return response()->json([
                'success'=>false
            ],403);
        }
        if($token != config('services.api.secret')){
            return response()->json([
                'success'=>false
            ],401);
        }

        return $next($request);
    }
}
