<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//rootにアクセスした場合PostsControllerのindexアクションを実行する
Route::get('/', 'PostsController@index'); #indexアクションにアクセス
// Route::get('/posts/{id}', 'PostsController@show'); #showアクションにアクセス(id別)
Route::get('/posts/{post}', 'PostsController@show');
