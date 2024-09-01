<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Obtener el token del encabezado "Authorization"
        $token = $request->bearerToken();
        // Verificar si el token está ausente
        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Token no provisto',
            ], 403); // Respuesta de acceso prohibido
        }

        // Obtener el secret API configurado en services.php
        $apiSecret = config('services.api.secret');

        // Verificar si el token no coincide con el secret API
        if (!hash_equals($token, $apiSecret)) {
            return response()->json([
                'success' => false,
                'message' => 'No autorizado',
            ], 401); // Respuesta de no autorizado
        }

        // Continuar con la solicitud si el token es válido
        return $next($request);
    }
}
