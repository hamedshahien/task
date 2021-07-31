<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function repositories(SearchRequest $request)
    {
        $endpoint =  sprintf( config('services.github.repos_search_uri').'?%s', $request->toQueryString());
        $response = Http::get($endpoint);

        // we can use mapper here to return specific data
        return json_decode((string) $response->body());
    }
}
