<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTag;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function __construct()
    {
        // ログインしないとタグを見れないようにする
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::all();

        return view('tag.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $posts = $tag->posts()->paginate(10);

        return view('tag.show', compact('posts', 'tag'));
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(CreateTag $request)
    {
        try {

            DB::beginTransaction();

            $tag = new Tag;
            $tag->name = $request->get('name');
            $tag->save();

            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();

        }

        return redirect()->route('tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }

    public function update(CreateTag $request, Tag $tag)
    {
        try {

            DB::beginTransaction();

            $tag->name = $request->get('name');
            $tag->save();

            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();

        }

        return redirect()->route('tag.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->posts()->detach();
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
