<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    // 投稿に対するコメント一覧を表示 引数があることに注意
    public function index(Request $username)
    {
        // 投稿に対するコメントを取得
        $comments = DB::table('comments')->where('id',$username)->orderBy('id','desc');

        // /show でコメントを表示するために引数で与える
        return view('index', ['comments' => $comments]);
    }

    // コメントの新規作成画面を表示
    public function create()
    {
        // 投稿を見ながらコメントをかけるといいけど
        // モーダルでもいいかも

        return view('/post/'.$id.'comment');
    }

    // コメントをデータベースに保存
    public function store(Request $request)
    {
        $post = new Post;
        $post->post_id = $request->get('post_id');
        $post->commentator = $request->get('commentator');
        $post->content  = $request->get('content');
        $post->save();

        // 投稿詳細に戻る ここで追加したコメントが追加されているように
        return redirect()->route('show');
    }

    public function show($id)
    {

    }

    // コメント編集画面を表示
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit',['post' => $post]);
    }

    // コメントの編集結果をデータベースに保存
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->post_id = $request->get('post_id');
        $post->commentator = $request->get('commentator');
        $post->content  = $request->get('content');
        $post->save();

        // 投稿詳細に戻る コメントが更新されているように showとは/showのこと
        return redirect()->route('show');

    }

    // コメントの削除 コメントIDをもらう
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        // 戻るのは投稿詳細画面
        return redirect()->route('show');
    }
}
