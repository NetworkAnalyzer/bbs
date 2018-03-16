<?php

// スレッド一覧を表示
Route::get('/index', 'ThreadController@index')->name('index');

// スレッドに属する投稿を表示
Route::get('/index/{thread}', 'ThreadController@show')->name('post');

// 新規投稿
Route::get('/index/{thread}/post', 'PostController@create')->name('post.create');
Route::post('/index/{thread}/post', 'PostController@store')->name('post.store');

// 投稿詳細
Route::get('/index/{thread}/{post}', 'PostController@show');

// 投稿の編集
Route::get('/index/{thread}/{post}/edit','PostController@edit');
Route::put('/index/{thread}/{post}','PostController@update');

// 投稿の削除
Route::delete('/index/{thread}/{post}','PostController@destroy');

/* タグ -----------------------------------------------------------*/

// タグ一覧
Route::get('/tag','TagController@index')->name('tag-index');

// タグ検索
Route::get('/tag/{id}','TagController@show');

// タグ作成
Route::get('/tag-create','TagController@create');
Route::post('/tag-create','TagController@store');

// タグ編集
Route::get('/tag/{id}/edit','TagController@edit');
Route::put('/tag/{id}','TagController@update');

// タグ削除
Route::delete('/tag/{id}','TagController@destroy');

// マイページ
Route::get('/user','UserController@index')->name('user');

/* 認証 -----------------------------------------------------------*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Blog -----------------------------------------------------------*/
Route::get('/blog-index', 'BlogController@index');
Route::get('/blog-index/{thread}', 'BlogController@show');

Route::get('/blog-post', 'BlogController@create');
Route::get('/blog-tag', 'BlogController@tag');
