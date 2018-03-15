<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    // ログインしないと入れないようにする
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 投稿一覧の表示
    public function index()
    {
        // テーブルpostsから全レコードをIDの降順で取得する ページネーションを実装
        $threads = Thread::orderBy('id', 'desc')->paginate(10);

        return view('index', ['threads' => $threads]);
    }

    public function show($thread)
    {
        $posts = Thread::find($thread)->posts()->orderBy('id','desc')->paginate(10);

        return view('index_cp',['posts' => $posts]);
    }


}
