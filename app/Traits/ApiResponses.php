<?php

namespace App\Traits;

trait ApiResponses
{
    protected function ok($message, $data = [])
    {
        return $this->success($data, $message);
    }

    protected function success($message = "", $data = [], $statusCode = 200)
    {
        return response()->json([
            "data" => $data,
            "message" => $message,
            "status" => $statusCode
        ], $statusCode);
    }

    protected function error($message, $statusCode = 200)
    {
        return response()->json([
            "message" => $message,
            "status" => $statusCode
        ], $statusCode);
    }
}