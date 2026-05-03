<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// --- Auth Routes ---
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// --- Public Routes ---
Route::apiResource('/books', BookController::class)->only(['index', 'show']);

// --- Transaction Routes (Sesuai Instruksi Tugas) ---
Route::middleware(['auth:api'])->group(function () {
    
    // Akses Customer: Create, Update, dan Show
    Route::middleware(['role:customer'])->group(function () {
        Route::post('/transactions', [TransactionController::class, 'store']);
        Route::put('/transactions/{id}', [TransactionController::class, 'update']);
        Route::get('/transactions/{id}', [TransactionController::class, 'show']);
    });

    // Akses Admin Read All (Index) dan Destroy
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/transactions', [TransactionController::class, 'index']);
        Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);
    });
});

// --- Admin Only Routes (Lainnya) ---
Route::middleware(['auth:api', 'role:admin'])->group(function () { 
    Route::apiResource('/genres', GenreController::class);
    Route::apiResource('/authors', AuthorController::class);
    Route::apiResource('/books', BookController::class)->only(['store', 'update', 'destroy']);
});