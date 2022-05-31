<?php


namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

trait PaginateTrait
{
    /**
     * Format response paginate data.
     *
     * @param  LengthAwarePaginator $paginator
     * @return array
     */
    public function handleResponseData($items, LengthAwarePaginator $paginator)
    {
        return [
            'items'     => $items,
            'total'     => $paginator->total(),
            'page'      => $paginator->currentPage(),
            'last_page' => $paginator->lastPage(),
            'count'     => $paginator->count(),
        ];
    }
}
