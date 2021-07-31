<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function repositories(Request $request)
    {
        $response = [
            'success' => true,
            'message' => "Welcome to API version 1",
        ];

        return response()->json($response, 200);
    }
}
