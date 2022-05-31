<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            ['id' => 1, 'name' => 'Author One'],
            ['id' => 2, 'name' => 'Author Two'],
            ['id' => 3, 'name' => 'Author Three'],
        ];

        foreach($authors as $author){
            Author::create($author);
        }
    }
}
