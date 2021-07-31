<?php

Route::group(['namespace' => 'API\v1'], function () {
    
    Route::get('repositories', 'SearchController@repositories');

});


