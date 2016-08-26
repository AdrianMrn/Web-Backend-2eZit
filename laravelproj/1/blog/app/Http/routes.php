<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', [
    'as' => 'welcome',
    'uses' => 'Controller@getWelcome'
]);


Route::get('/thread/{id}', [
    'as' => 'home',
    'uses' => 'Controller@getThread'
]);

Route::get('/thread/add', 'Controller@postThread');

Route::get('/thread/{id}/edit', 'Controller@editThread');

Route::post('/thread/{id}', 'Controller@deleteThread');


Route::post('/vote/up', 'Controller@upvote');
Route::post('/vote/down', 'Controller@downvote');

Route::auth();

