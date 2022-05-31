<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    /**
     * @return Model
     */
    public function getModel()
    {
        return Book::class;
    }

    /**
     * @param  mixed $request
     * @return Collection
     */
    public function getBooks(Request $request)
    {
        $limit         = $request->limit;
        $page          = $request->page;
        $selectColumn  = [
            'books.id',
            'books.publisher',
            'books.title',
            'books.summary',
        ];

        return $this->model
            ->with(['authors:name'])
            ->filterCondition($request)
            ->orderBy('books.id')
            ->paginate($limit, $selectColumn, 'page', $page);
    }
}
