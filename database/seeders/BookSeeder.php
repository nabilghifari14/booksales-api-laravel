public function run(): void
{
    $books = [
        ['title' => 'Bumi Manusia', 'description' => 'Bagian pertama Buru Quartet.', 'year' => 1980],
        ['title' => 'Pulang', 'description' => 'Novel tentang perjalanan pulang.', 'year' => 2012],
        ['title' => 'Filosofi Kopi', 'description' => 'Kumpulan cerita pendek.', 'year' => 2006],
        ['title' => 'Laskar Pelangi', 'description' => 'Kisah anak-anak Belitong.', 'year' => 2005],
        ['title' => 'Sang Pemimpi', 'description' => 'Lanjutan Laskar Pelangi.', 'year' => 2006],
    ];

    foreach ($books as $book) {
        \App\Models\Book::create($book);
    }
}