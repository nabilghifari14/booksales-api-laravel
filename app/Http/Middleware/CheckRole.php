<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Pastikan user sudah login dan rolenya sesuai (misal: admin)
        if (!$request->user() || $request->user()->role !== $role) {
            return response()->json([
                'message' => 'Akses ditolak! Anda bukan ' . $role
            ], 403);
        }

        return $next($request);
    }
}