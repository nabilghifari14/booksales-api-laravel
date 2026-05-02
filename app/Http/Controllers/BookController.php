public function index() {
    $books = \App\Models\Book::all();
    $authors = \App\Models\Author::all();
    return view('library', compact('books', 'authors'));
}