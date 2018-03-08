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

/*どこに繋ぐのかを考える
  Route::getと書くとGETメソッドしか書けてない
  POSTメソッドを使う場合はRoute::postを書く
*/

/*  投稿一覧を表示
    GETメソッドで /index にアクセスした時，PostControllerのindexアクションを実行する
*/

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


/* コメント -------------------------------------------------------*/
// 各投稿に対するコメントの表示
//Route::get('/post/{id}','CommentController@show');

// 新規コメント
//Route::get('/post/{id}', 'CommentController@create');
//Route::post('/post/{id}', 'CommentController@store');

// コメント編集
//Route::get('/post/{id}/comment','CommentController@edit');
//Route::post('/post/{id}','CommentController@update');

// コメントの削除
//Route::delete('#','CommentController@destroy');


/* クロージャで記述した例

    Route::get('who/',function($name){
        return 'こんにちは'.$name.'さん';
    });

   普通はこんな書き方はしないでコントローラを利用する
*/


/* 認証 -----------------------------------------------------------*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
