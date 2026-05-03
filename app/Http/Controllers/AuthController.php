<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Jalankan proses login dan dapatkan token JWT.
     */
    public function login(Request $request)
    {
        // 1. Ambil input email dan password dari Postman
        $credentials = $request->only('email', 'password');

        // 2. Cek apakah email dan password cocok dengan database
        // Jika cocok, fungsi attempt() akan otomatis mengembalikan token JWT
        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password salah!'
            ], 401);
        }

        // 3. Jika berhasil, kirim token ke Postman
        return $this->respondWithToken($token);
    }

    /**
     * Format respon token yang akan dikirim ke user.
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'success' => true,
            'user'    => auth()->user(), // Mengirim data user (termasuk role)
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}