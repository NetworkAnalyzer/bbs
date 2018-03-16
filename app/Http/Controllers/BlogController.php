<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $threads = Thread::orderBy('id', 'desc')->paginate(10);

        return view('blog.index', ['threads' => $threads]);
    }

    public function show($thread)
    {
        $posts = Thread::find($thread)->posts()->orderBy('id','desc')->paginate(10);

        return view('blog.post-index',['posts' => $posts]);
    }

    public function create()
    {
        return view('blog.post');
    }

    public function about()
    {
        return view('blog.about');
    }

    public function tag(){
        return view('blog.tag');
    }
}
