<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookSalesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/booksales', [BookSalesController::class, 'index']);
