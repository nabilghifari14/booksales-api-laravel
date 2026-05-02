<?php

namespace App\Http\Controllers;

use App\Models\Book; // Pastikan ini terpanggil
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json(['success' => true, 'data' => $books]);
    }

    public function store(Request $request)
    {
        try {
            $book = Book::create([
                'title'     => $request->title,
                'author_id' => $request->author_id,
                'genre_id'  => $request->genre_id,
            ]);

            return response()->json([
                'success' => true, 
                'message' => 'Buku berhasil ditambahkan',
                'data'    => $book
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}