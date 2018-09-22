<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        // ログインしないと投稿を見られないようにする
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('index', compact('posts'));
    }

    public function create()
    {
        $tagNames = Tag::pluck('name');
        $tagNames = implode(",", array($tagNames));

        return view('post', compact('tagNames'));
    }

    public function store(Request $request)
    {
        $tagIds = $this->toTagId($request->get('tags'));

        $request->validate([
            'content' => 'required|max:255',
        ]);

        $post = new Post;
        $post->user_id   = Auth::user()->id;
        $post->thread_id = json_decode($request->thread)->id;
        $post->content   = $request->get('content');
        $post->save();

        $post->tags()->attach($tagIds);

        return redirect()->route('post', ['thread' => $post->thread]);
    }

    public function show(Thread $thread, Post $post)
    {
        return view('show', compact('post'));
    }

    public function edit(Thread $thread, Post $post)
    {
        $tagNames = Tag::pluck('name');
        $tagNames = implode(",", array($tagNames));

        return view('edit', compact('tagNames'));
    }

    public function update(Request $request, Thread $thread, Post $post)
    {
        $tagIds = $this->toTagId($request->get('tags'));

        $request->validate([
            'content' => 'required|max:255',
        ]);

        $post->content = $request->get('content');
        $post->save();

        $post->tags()->sync($tagIds);

        return redirect()->route('post', compact('thread'));
    }

    public function destroy(Thread $thread, Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('post', compact('thread'));
    }

    /**
     * タグ名をタグIDに変換する
     * タグ名がDBに存在しなかった場合は新規登録する
     * @param $tagNames
     */
    public function toTagId($tagNames)
    {
        // タグが文字列で繋がっているので，配列に変換する
        $tagNames = explode(",", $tagNames);

        // 新しいタグを登録すると同時に，タグIDを取得する
        foreach ($tagNames as $tagName){
            $tagIds[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }

        return $tagIds;
    }
}
