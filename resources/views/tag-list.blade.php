<!-- 投稿を表示するページ -->

@extends('default')

@section('title')
    BBS -タグ一覧-
@endsection

@section('content')

@section('headline')
    タグ一覧
@endsection

<div class="post-list">
    <!-- 投稿の表示 -->
    <table class="table table-stripedgit ">
        <thead>
        <tr>
            <th></th>
            <th>タグID</th>
            <th>タグ名</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <th scope="row">1</th>
                <td>{{ $tag->id }}</td>
                <td>{{ link_to_action('PostController@search',$tag->name,['tag' => $tag],['class' => 'label label-default']) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection