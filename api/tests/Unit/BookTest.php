<?php

namespace Tests\Unit;

//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Book;
use Tests\TestCase;


class BookTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * Unit test for search Book.
     *
     * @return void
     */
    public function test_search()
    {
        $response = $this->get('/search/book');
        $response->assertStatus(200);

        $response_param = $this->get('/search/book?filter=Author');
        $response_param->assertStatus(200);
    }

    public function test_equal_author()
    {
        $expected  = "Author Three";
        $actual = "Author Three";

        $this->assertEquals(
            $expected,
            $actual
        );
    }

    public function test_not_equal_author()
    {
        $expected  = "Author Three";
        $actual = "Jonny";

        $this->assertEquals(
            $expected,
            $actual
        );
    }

    public function testDatabase()
    {
        // Make call to application...

        $this->assertDatabaseHas('books', [
            'publisher' => 'Stephan de Vries',
            'title' => 'stephan',
            "summary" => "some long summary",
        ]);
    }

    public function test_book_be_longs_to_many_authors()
    {
        $book = Book::class;
        $this->assertInstanceOf(BelongsToMany::class, $book->authors());
        $this->assertEquals('book_id', $book->authors()->getForeignPivotKeyName());
        $this->assertEquals('author_id', $book->authors()->getRelatedPivotKeyName());

    }
}
