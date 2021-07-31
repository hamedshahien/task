<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;


class RepositoriesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_search()
    {
        Http::fake();

        Http::get('api/v1/repositories', [ 'sort' => 'stars', 'order'=>'desc']);

        Http::assertSent( function ($request) {
            return $request->url() == 'api/v1/repositories?sort=stars&order=desc' && $request['sort'] == 'stars' &&  $request['order'] == 'desc' ;
        });

    }
}
