<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    public function index()
    {
        return response()->json([
            'status'=>'ok',
            'message'=>'Products endpoint working'
        ]);
    }
}
