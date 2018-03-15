<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // ログインしないと入れないようにする
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 投稿一覧の表示
    public function index()
    {
        //テーブルpostsから全レコードをIDの降順で取得する ページネーションを実装
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('index', ['posts' => $posts]);
    }

    // 新規投稿画面の表示
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

    // 投稿をデータベースに保存
    public function store(Request $request)
    {
        // 取得したタグ名が文字列で繋がってるから配列に変換
        $tags = $request->get('tags');      // 文字列だから
        $tags = explode(",", $tags);    // 配列に変換

        // タグ名をタグIDに変換
        foreach ($tags as $tag){
            // タグが存在すれば取得し，存在しなければタグを登録する
            $ids[] = Tag::firstOrCreate(['name' => $tag])->id;
        }

        $request->validate([
            'content' => 'required|max:255',
        ]);

        // 投稿内容を保存
        $post = new Post;
        $post->user_id   = Auth::user()->id;
        $post->thread_id = $request->thread;
        $post->content   = $request->get('content');
        $post->save();

        // タグを保存
        $post = Post::all()->last();
        $post->tags()->attach($ids);

        // 投稿一覧に戻る
        return redirect()->route('post',['thread' => $post->thread]);
    }

    // 投稿詳細の表示
    public function show($thread,$post)
    {
        $post = Post::find($post);

        return view('show',['post' => $post]);
    }

    // 編集画面の表示
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

    // 編集結果をデータベースに保存
    public function update(Request $request, $thread, $id)
    {
        // 取得したタグ名が文字列で繋がってるから配列に変換
        $tags = $request->get('tags');      // 文字列だから
        $tags = explode(",", $tags);    // 配列に変換

        // タグ名をタグIDに変換
        foreach ($tags as $tag){
            // タグが存在すれば取得し，存在しなければタグを登録する
            $ids[] = Tag::firstOrCreate(['name' => $tag])->id;
        }

        $request->validate([
            'content' => 'required|max:255',
        ]);

        $post = Post::find($id);
        // user_idは更新しない
        $post->content  = $request->get('content');
        $post->save();

        // タグを更新する
        $post = Post::find($id);
        $post->tags()->sync($ids);

        // 投稿一覧に戻る
        return redirect()->route('post',['thread' => $post->thread]);
    }

    // 投稿の削除
    public function destroy($thread,$post)
    {
        $post = Post::find($post);

        // タグの削除
        $post->tags()->detach();

        // 投稿の削除
        $post->delete();

        return redirect()->route('post',['thread' => $post->thread]);
    }
}
