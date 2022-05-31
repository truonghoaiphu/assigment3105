<?php

namespace Database\Seeders;

use App\Models\BookAuthor;
use Illuminate\Database\Seeder;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book_authors = [
            ['id' => 1, 'book_id' => 1, 'author_id' => 1],
            ['id' => 2, 'book_id' => 1, 'author_id' => 2],
            ['id' => 3, 'book_id' => 2, 'author_id' => 3],
            ['id' => 4, 'book_id' => 3, 'author_id' => 1],
            ['id' => 5, 'book_id' => 3, 'author_id' => 2],
        ];

        foreach($book_authors as $book_author){
            BookAuthor::create($book_author);
        }
    }
}
