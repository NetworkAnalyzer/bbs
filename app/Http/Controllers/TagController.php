<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // タグ一覧の表示
    public function index()
    {
        $tags = Tag::all();

        return view('tag-list',['tags' => $tags]);
    }

    public function search($tag)
    {
        $posts = Tag::find($tag)->posts()->paginate(10);

        return view('tag',['posts' => $posts]);
    }
}
