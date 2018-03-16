<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // ログインしないと入れないようにする
    public function __construct()
    {
        $this->middleware('auth');
    }

    // タグ一覧の表示
    public function index()
    {
        $tags = Tag::all();

        return view('tag.index',['tags' => $tags]);
    }

    public function show($tag)
    {
        $posts = Tag::find($tag)->posts()->paginate(10);
        $tag = Tag::find($tag);

        return view('tag.show',['posts' => $posts,'tag' => $tag]);
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|max:16|unique:tags',
        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tag.index');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tag.edit',['tag' => $tag]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'bail|required|max:16|unique:tags',
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tag.index');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);

        // タグを外す
        $tag->posts()->detach();

        // タグを削除
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
