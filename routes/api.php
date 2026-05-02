<?php

use App\Http\Controllers\BookSalesController;
use Illuminate\Support\Facades\Route;

Route::get('/booksales', [BookSalesController::class, 'index']);