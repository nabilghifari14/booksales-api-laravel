<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookSalesController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data buku dan penulis',
            'data' => [
                'books' => $books,
                'authors' => $authors
            ]
        ], 200);
    }
}