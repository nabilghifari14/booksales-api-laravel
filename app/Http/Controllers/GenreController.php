<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // 1. Fitur Read all data untuk tabel genre
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            'success' => true,
            'data' => $genres
        ], 200); // HTTP Status 200 OK
    }

    // 2. Fitur Create data untuk tabel genre
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $genre = Genre::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Genre berhasil dibuat',
            'data' => $genre
        ], 201); // HTTP Status 201 Created[cite: 1]
    }
}