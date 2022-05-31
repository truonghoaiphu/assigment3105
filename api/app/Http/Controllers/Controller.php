<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $data
     * @param $msg
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */

    public function successResponse($data, $msg, $statusCode = 200)
    {
        return response()->json([
            'status'  => $statusCode,
            'message' => $msg,
            'data'    => $data,
        ], $statusCode);
    }
}
