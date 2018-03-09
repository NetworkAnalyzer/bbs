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
            'content' => 'required',
        ]);

        // postsに保存
        $post = new Post;
        $post->user_id  = Auth::user()->id;
        $post->title    = $request->get('title');
        $post->content  = $request->get('content');
        $post->save();

        // ラジオボタンからタグを取得
        $tag = $request->get('select_tag');

        // 中間テーブルに保存
        $post = Post::all()->last();
        $post->tag()->attach($tag);

        // 投稿一覧に戻る
        return redirect()->route('index');
    }

    // 投稿詳細の表示
    public function show($id)
    {
        $post = Post::find($id);

        $tag = Post::find($id)->tag()->first()->name;

        return view('show',['post' => $post,'tag' => $tag]);
    }

    // 編集画面の表示
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit',['post' => $post]);
    }

    // 編集結果をデータベースに保存
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // username や content はinputやtextareaのname
            'title'   => 'bail|required|max:16',
            'content' => 'required',
        ]);

        $post = Post::find($id);
        // user_idは更新しない
        $post->title    = $request->get('title');
        $post->content  = $request->get('content');
        $post->save();

        // 投稿一覧に戻る
        return redirect()->route('index');
    }

    // 投稿の削除
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('index');
    }
}
