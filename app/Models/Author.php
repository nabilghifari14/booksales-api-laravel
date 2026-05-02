<?php
namespace App\Models;

class Author
{
    private $authors = [
        ['id' => 1, 'name' => 'Pramoedya Ananta Toer', 'country' => 'Indonesia'],
        ['id' => 2, 'name' => 'Tere Liye', 'country' => 'Indonesia'],
        ['id' => 3, 'name' => 'Mark Manson', 'country' => 'USA'],
        ['id' => 4, 'name' => 'Dee Lestari', 'country' => 'Indonesia'],
        ['id' => 5, 'name' => 'Haruki Murakami', 'country' => 'Jepang'],
    ];

    public function getAllAuthors() {
        return $this->authors;
    }
}