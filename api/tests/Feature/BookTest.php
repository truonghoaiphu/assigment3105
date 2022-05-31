<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_search()
    {
        $response = $this->get('/search/book');
        $response->assertStatus(200);

        $response_param = $this->get('/search/book?filter=Author');
        $response_param->assertStatus(200);
    }
}
