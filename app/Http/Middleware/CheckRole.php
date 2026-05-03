<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user sudah login dan punya role yang sesuai[cite: 1]
        if (auth()->check() && auth()->user()->role == $role) {
            return $next($request);
        }

        return response()->json(['message' => "Akses ditolak! Anda bukan $role"], 403);

            return $next($request);
    }
}