<?php
namespace App\Models;

class Genre
{
    private $genres = [
        ['id' => 1, 'name' => 'Fiksi', 'description' => 'Karya sastra imajinatif'],
        ['id' => 2, 'name' => 'Non-Fiksi', 'description' => 'Buku berdasarkan fakta'],
        ['id' => 3, 'name' => 'Sejarah', 'description' => 'Catatan peristiwa masa lalu'],
        ['id' => 4, 'name' => 'Teknologi', 'description' => 'Informasi seputar dunia IT'],
        ['id' => 5, 'name' => 'Psikologi', 'description' => 'Ilmu tentang perilaku manusia'],
    ];

    public function getAllGenres() {
        return $this->genres;
    }
}