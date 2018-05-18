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
Route::get('/posts/{post}', 'PostsController@show')->where('post', '[0-9]+');
Route::get('posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update'); // 記事の更新ルーティング
Route::delete('/posts/{post}', 'PostsController@destroy'); //削除ルーティング
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy');
