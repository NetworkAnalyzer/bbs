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

        return view('tag-index',['tags' => $tags]);
    }

    public function search($tag)
    {
        $posts = Tag::find($tag)->posts()->paginate(10);

        return view('tag-detail',['posts' => $posts]);
    }

    public function create()
    {
        return view('tag-create');
    }

    public function store(Request $request)
    {
        $tag = new Tag;

        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tag-index');
    }
}
