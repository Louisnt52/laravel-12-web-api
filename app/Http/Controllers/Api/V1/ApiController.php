<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\JsonMatches;

class ApiController extends Controller
{
    protected function successResponse(array $data = [], string $message = "OK", int $status = 200 ):JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $status );

    }
    protected function errorResponse(string $message = "Error", int $status = 404 ):JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $status );
    }
}
