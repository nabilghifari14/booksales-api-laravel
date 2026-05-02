<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;

class BookSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Pramoedya Ananta Toer',
            'bio' => 'Penulis legendaris Indonesia yang menulis Bumi Manusia.'
        ]);

        // Isi Data Buku
        Book::create([
            'title' => 'Bumi Manusia',
            'description' => 'Novel pertama dari Tetralogi Buru.',
            'year' => 1980
        ]);
    }
}
