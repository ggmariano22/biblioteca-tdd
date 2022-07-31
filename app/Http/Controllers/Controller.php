<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function responseToJsonSuccess(
        ?array $data = null,
        int $httpCode = 200,
        ?string $message = null
    ): JsonResponse
    {
        return $this->toJsonResponse(
            data: $data,
            httpCode: $httpCode,
            message: $message
        );
    }

    protected function responseToJsonError(
        ?array $data = null,
        int $httpCode = 400,
        ?string $message = null
    ): JsonResponse
    {
        return $this->toJsonResponse(
            data: $data,
            httpCode: $httpCode,
            success: false,
            message: $message
        );
    }

    protected function toJsonResponse(
        ?array $data = null,
        int $httpCode = 200,
        bool $success = true,
        ?string $message = null
    ): JsonResponse
    {
        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, $httpCode);
    }
}
