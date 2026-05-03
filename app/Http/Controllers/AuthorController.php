<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        try {
            $authors = Author::all();
            return response()->json([
                'success' => true,
                'data' => $authors
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $author = Author::create([
                'name' => $request->name
            ]);

            return response()->json([
                'success' => true,
                'data' => $author
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
        
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Data Author tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'data' => $author]);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Data Author tidak ditemukan'], 404);
        }

        $author->update($request->all());

        return response()->json(['success' => true, 'message' => 'Data berhasil diubah', 'data' => $author]);
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Data Author tidak ditemukan'], 404);
        }

        $author->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}