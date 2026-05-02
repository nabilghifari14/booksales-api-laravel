<?php
namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Author;

class BookSalesController extends Controller
{
    public function index() {
        $genreModel = new Genre();
        $authorModel = new Author();

        return view('booksales', [
            'genres' => $genreModel->getAllGenres(),
            'authors' => $authorModel->getAllAuthors()
        ]);
    }
}