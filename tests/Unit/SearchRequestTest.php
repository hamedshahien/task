<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Requests\SearchRequest;

class SearchRequestTest extends TestCase
{

    /**
     *
     * @test
     */
    public function test_it_can_create_query_for_order()
    {
        $search_request = new SearchRequest();
        $this->assertStringContainsString( 'order='.config('github.order'), $search_request->toQueryString());

        $search_request = new SearchRequest(['order'=>'asc']);
        $this->assertStringContainsString( 'order=asc', $search_request->toQueryString());


        $search_request = new SearchRequest(['order'=>'desc']);
        $this->assertStringContainsString( 'order=desc', $search_request->toQueryString());
    }

    /**
     *
     * @test
     */
    public function test_it_can_create_query_for_limit()
    {
        $search_request = new SearchRequest(['per_page'=>15]);
        $this->assertStringContainsString( 'per_page=15', $search_request->toQueryString());
    }


    /**
     *
     * @test
     */
    public function test_it_can_create_query_for_query()
    {
        $search_request = new SearchRequest(['q'=>'language:php + created:<2019-01-10']);
        $this->assertStringContainsString( 'language:php + created:<2019-01-10', $search_request->toQueryString());
    }


    /**
     *
     * @test
     */
    public function test_it_can_create_query_for_stars()
    {
        $search_request = new SearchRequest();
        $this->assertStringContainsString( 'stars:'.config('services.github.stars'), $search_request->toQueryString());

        $search_request = new SearchRequest(['q' => 'stars:>=454']);
        $this->assertStringContainsString( 'stars:>=454', $search_request->toQueryString());
    }



}
