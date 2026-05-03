<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --- 1. RUTE AUTENTIKASI (Pintu Masuk Token) ---
// Rute ini digunakan untuk mendapatkan access_token via JWT
Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

// --- 2. RUTE PUBLIK (Bisa diakses tanpa login) ---
// Siapa pun bisa melihat daftar genre, penulis, dan buku (Read Only)
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('books', BookController::class)->only(['index', 'show']);

// --- 3. RUTE TERPROTEKSI (Hanya Admin) ---
// Hanya user yang sudah login (auth:api) DAN memiliki role admin yang bisa memodifikasi data
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::apiResource('genres', GenreController::class)->except(['index', 'show']);
    Route::apiResource('authors', AuthorController::class)->except(['index', 'show']);
    Route::apiResource('books', BookController::class)->except(['index', 'show']);
});