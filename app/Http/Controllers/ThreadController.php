<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function __construct()
    {
        // ログインしないとスレッドを見られないようにする
        $this->middleware('auth');
    }

    public function index()
    {
        $threads = Thread::orderBy('id', 'desc')->paginate(10);

        return view('index', ['threads' => $threads]);
    }

    public function show($thread)
    {
        $posts = Thread::find($thread)->posts()->orderBy('id','desc')->paginate(10);

        return view('index_cp',['posts' => $posts, 'thread' => $thread]);
    }


}
