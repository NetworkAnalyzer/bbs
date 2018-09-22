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
        $this->middleware('auth');
    }

    public function index()
    {
        $threads = Thread::orderBy('id', 'desc')->paginate(10);

        return view('index', compact('threads'));
    }

    public function show(Thread $thread)
    {
        $posts = $thread->posts()->orderBy('id', 'desc')->paginate(10);

        return view('index_cp', compact('posts', 'thread'));
    }


}
