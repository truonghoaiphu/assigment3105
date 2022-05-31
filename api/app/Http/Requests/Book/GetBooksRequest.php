<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\BaseRequest;

class GetBooksRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'limit'          => 'numeric',
            'page'           => 'numeric',
        ];
    }
}
