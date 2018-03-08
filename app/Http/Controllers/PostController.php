<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        $users = DB::table('users');
        // dd($users);
        /*
        $user  = User::find(1);     // id = 1 のユーザ情報を取得
        //dd($user);                // 取得できた
        $posts = $user->getPosts;   // user_id = 1 の投稿を取得
        dd($posts);
        */

        /*
         *
          投稿からユーザ名を取得する
        $post = Post::find(27);
        $user = $post->getUser;
        dd($user);
        */

        return view('index', ['posts' => $posts,'users' => $users]);
    }

    // 新規投稿画面の表示
    public function create()
    {
        return view('post');
    }

    // 投稿をデータベースに保存
    public function store(Request $request)
    {
        /*
         *  validateメソッドにバリデーションルールを与えると
         *    失敗した場合，適切な処理(今回は以前のページへリダイレクト)が自動的に生成される
         *    成功した場合，通常通り次の処理が行われる
         */
        $request->validate([
            // bailを設定すると，ルールを左から順に確かめて満たさないルールが見つかった時点で判定を止める
            // 入力を必須にする required
            // ユーザ名を重複させない unique:posts
            'title' => 'bail|required|max:16',
            'content' => 'required',
        ]);

        $post = new Post;
        // id → user_id
        $post->user_id  = Auth::user()->id;
        $post->title    = $request->get('title');
        $post->content  = $request->get('content');
        $post->save();

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
        /*
         *  コントローラで認可するとき
         *  $this->authorize('edit', $post);
         */
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
