<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\GetBooksRequest;
use App\Models\Author;
use App\Models\Book;
use App\Repositories\Book\BookRepositoryInterface;
use App\Http\Constant\Message;
use App\Traits\PaginateTrait;

class BookController extends Controller
{
    use PaginateTrait;
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @param GetBooksRequest $request
     * @return mixed
     */
    public function search(GetBooksRequest $request) {
        $books = $this->bookRepository->getBooks($request);
        $items = $books->map(function (Book $book) {
            $authors = $book->authors->map(function (Author $author){
                return $author->name;
            });

            return [
                'id'        => $book->id,
                'publisher' => $book->publisher,
                'title'     => $book->title,
                'summary'   => $book->summary,
                'authors'   => $authors,
            ];
        });

        return $this->successResponse(
            $this->handleResponseData($items, $books),
            Message::GET_BOOKS_SUCCESS
        );
    }
}
