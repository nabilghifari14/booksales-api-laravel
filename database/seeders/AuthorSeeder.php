public function run(): void
{
    $authors = [
        ['name' => 'Pramoedya Ananta Toer', 'bio' => 'Penulis legendaris Indonesia.'],
        ['name' => 'Tere Liye', 'bio' => 'Penulis novel populer.'],
        ['name' => 'Dee Lestari', 'bio' => 'Penulis seri Supernova.'],
        ['name' => 'Andrea Hirata', 'bio' => 'Penulis Laskar Pelangi.'],
        ['name' => 'Sujiwo Tejo', 'bio' => 'Budayawan dan penulis.'],
    ];

    foreach ($authors as $author) {
        \App\Models\Author::create($author);
    }
}