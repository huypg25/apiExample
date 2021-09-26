<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', 'ApiController@getAllPosts');
Route::get('post/{post}', 'ApiController@getPost');
Route::post('post','ApiController@createPost');
Route::put('post/{post}', 'ApiController@updatePost');
Route::delete('post/{post}','ApiController@deletePost');
