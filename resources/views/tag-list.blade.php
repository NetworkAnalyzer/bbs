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
    <table border="1">
        <tr>
            <th>タグID</th>
            <th>タグ名</th>
        </tr>
        @foreach($tags as $tag)
            <tr>
                <td style="width:100px;">{{ $tag->id }}</td>
                <td>{{ link_to_action('PostController@search',$tag->name,['tag' => $tag],['class' => 'label label-default']) }}</td>
            </tr>
        @endforeach
    </table>
</div>

@endsection