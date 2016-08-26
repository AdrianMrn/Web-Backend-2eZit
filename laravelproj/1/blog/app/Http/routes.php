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


Route::get('/add', 'Controller@createThread');
Route::post('/post', 'Controller@postThread');
Route::get('/thread/edit/{id}', 'Controller@editThread');
Route::post('/thread/delete/{id}', 'Controller@deleteThread');


Route::post('/vote/up', 'Controller@upvote');
Route::post('/vote/down', 'Controller@downvote');


Route::post('/comments/add', 'Controller@postComment');
Route::get('/comments/edit/{id}', 'Controller@editComment');
Route::post('/comments/edit/post', 'Controller@postEditedComment');
Route::get('/comments/delete/{id}', 'Controller@deleteComment');

Route::auth();


?>