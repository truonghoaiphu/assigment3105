<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\Redis;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            ['id' => 1, 'publisher' => 'Stephan de Vries', 'title' => 'stephan', 'summary' => 'some long summary'],
            ['id' => 2, 'publisher' => 'John doe', 'title' => 'johnny', 'summary' => 'how detail'],
            ['id' => 3, 'publisher' => 'Packt', 'title' => 'Mastering Something', 'summary' => 'some long summary'],
        ];

        foreach($books as $book){
            Book::create($book);
        }
    }
}
