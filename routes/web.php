<?php

/* 投稿 -----------------------------------------------------------*/
// 投稿一覧
Route::get('/index', 'PostController@index')->name('index');

// 新規投稿
Route::get('/post', 'PostController@create')->name('create');
Route::post('/post', 'PostController@store')->name('post');

// 投稿詳細
Route::get('/post/{id}', 'PostController@show');

// 投稿の編集
Route::get('/post/{id}/edit','PostController@edit');
Route::put('/post/{id}','PostController@update');

// 投稿の削除
Route::delete('/post/{id}','PostController@destroy');

// マイページ
Route::get('/user','UserController@index')->name('user');

/* 認証 -----------------------------------------------------------*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
