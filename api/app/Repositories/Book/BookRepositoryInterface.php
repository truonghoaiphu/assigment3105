<?php

namespace App\Repositories\Book;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Http\Request;

interface BookRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param  Request $request
     * @return mixed
     */
    public function getBooks(Request $request);
}
