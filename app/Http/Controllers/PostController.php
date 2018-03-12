<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        //テーブルpostsから全レコードを取得する ページネーションを実装
        $posts = DB::table('posts')->orderBy('id','desc')->paginate(10);

        return view('index', ['posts' => $posts]);
    }

    // 新規投稿画面の表示
    public function create()
    {
        return view('post');
    }

    // 投稿をデータベースに保存
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|max:16',
            'content' => 'required|max:255',
        ]);

        // 投稿内容を保存
        $post = new Post;
        $post->user_id  = Auth::user()->id;
        $post->title    = $request->get('title');
        $post->content  = $request->get('content');
        $post->save();

        // チェックボックスからタグを取得
        $tags = $request->get('select-tag');

        // タグを保存
        $post = Post::all()->last();
        $post->tags()->attach($tags);

        // 投稿一覧に戻る
        return redirect()->route('index');
    }

    // 投稿詳細の表示
    public function show($id)
    {
        $post = Post::find($id);

        return view('show',['post' => $post]);
    }

    // 編集画面の表示
    public function edit($id)
    {
        $post = Post::find($id);

        $tags = $post->tags;

        return view('edit',['post' => $post,'tags' => $tags]);
    }

    // 編集結果をデータベースに保存
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // username や content はinputやtextareaのname
            'title'   => 'bail|required|max:16',
            'content' => 'required|max:255',
        ]);

        $post = Post::find($id);
        // user_idは更新しない
        $post->title    = $request->get('title');
        $post->content  = $request->get('content');
        $post->save();

        // タグ情報を取得
        $tags = $request->get('select-tag');

        // タグを更新する
        $post = Post::find($id);
        $post->tags()->sync($tags);

        // 投稿一覧に戻る
        return redirect()->route('index');
    }

    // 投稿の削除
    public function destroy($id)
    {
        $post = Post::find($id);

        // タグの削除
        $post->tags()->detach();

        // 投稿の削除
        $post->delete();

        return redirect()->route('index');
    }

    public function search($tag)
    {
        $posts = Tag::find($tag)->posts()->paginate(10);

        return view('tag',['posts' => $posts]);
    }

    public function tag()
    {
        $tags = Tag::all();

        return view('tag-list',['tags' => $tags]);
    }
}
