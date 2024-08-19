<?php

namespace App\Traits;
use Carbon\Carbon;

trait ApiResponse
{
    /**
     * Retun a success JSON response.
     * 
     * @param array|string $data
     * @param string $message
     * @param int|null $code
     * 
     * @retun \Illuminate\Http\JsonRequest;
    */

    protected function success($data, string $message = null, int $code = 200)
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Retun a success JSON response.
     * 
     * @param string $message
     * @param int|null $code
     * @param array|string|null $data
     * 
     * @retun \Illuminate\Http\JsonRequest;
    */

    protected function error($data = null, string $message = null, int $code)
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}