<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
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

        return view('index', ['posts' => $posts]);
    }

    public function create()
    {
        $tags = Tag::all();

        // 補完用
        foreach ($tags as $tag){
            $tag_names[] = $tag->name;
        }
        $tag_names = implode(",",$tag_names);   //jsに渡すために配列をCSVに変換

        return view('post',['tags' => $tags, 'tag_names' => $tag_names]);
    }

    public function store(Request $request)
    {
        // 取得したタグ名が文字列で繋がってるから配列に変換
        $tags = $request->get('tags');
        $tags = explode(",", $tags);

        // タグ名をタグIDに変換
        foreach ($tags as $tag){
            $ids[] = Tag::firstOrCreate(['name' => $tag])->id;
        }

        $request->validate([
            'content' => 'required|max:255',
        ]);

        $post = new Post;
        $post->user_id   = Auth::user()->id;
        $post->thread_id = $request->thread;
        $post->content   = $request->get('content');
        $post->save();

        $post = Post::all()->last();
        $post->tags()->attach($ids);

        return redirect()->route('post',['thread' => $post->thread]);
    }

    public function show($thread,$post)
    {
        $post = Post::find($post);

        return view('show',['post' => $post]);
    }

    public function edit($thread,$post)
    {
        $post = Post::find($post);

        $tags = Tag::all();

        // 補完用
        foreach ($tags as $tag){
            $tag_names[] = $tag->name;
        }
        $tag_names = implode(",",$tag_names);   //jsに渡すために配列をCSVに変換

        return view('edit',['post' => $post,'tags' => $tags,'tag_names' => $tag_names]);
    }

    public function update(Request $request, $thread, $id)
    {
        // 取得したタグ名が文字列で繋がってるから配列に変換
        $tags = $request->get('tags');      // 文字列だから
        $tags = explode(",", $tags);    // 配列に変換

        // タグ名をタグIDに変換
        foreach ($tags as $tag){
            $ids[] = Tag::firstOrCreate(['name' => $tag])->id;
        }

        $request->validate([
            'content' => 'required|max:255',
        ]);

        $post = Post::find($id);
        $post->content  = $request->get('content');
        $post->save();

        $post = Post::find($id);
        $post->tags()->sync($ids);

        return redirect()->route('post',['thread' => $post->thread]);
    }

    public function destroy($thread,$post)
    {
        $post = Post::find($post);

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('post',['thread' => $post->thread]);
    }
}
