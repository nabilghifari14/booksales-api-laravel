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
        ], 201);
    }

        public function show($id)
    {
        $genre = Genre::find($id);

        // Validasi jika data tidak ditemukan
        if (!$genre) {
            return response()->json(['message' => 'Data Genre tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'data' => $genre]);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Data Genre tidak ditemukan'], 404);
        }

        // Update data lama dengan yang baru
        $genre->update($request->all());

        return response()->json(['success' => true, 'message' => 'Data berhasil diubah', 'data' => $genre]);
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Data Genre tidak ditemukan'], 404);
        }

        $genre->delete(); // Menghapus data dari database

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}