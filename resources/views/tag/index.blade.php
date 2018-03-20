<!-- 投稿を表示するページ -->

@extends('default')

@section('js_for_table')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#js-table').DataTable();
        });
    </script>
@endsection

@section('title')
    BBS -タグ一覧-
@endsection

@section('content')

@section('headline')
    タグ一覧
@endsection

<div class="form-group">
    {{ link_to('/tag-create', '新規タグ', ['class' => 'btn btn-primary']) }}
</div>

<div class="post-list">
    <!-- 投稿の表示 -->
    <table class="table table-stripedgit" id="js-table">
        <thead>
        <tr>
            <th></th>
            <th>タグID</th>
            <th>タグ名</th>
            <th>投稿数</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <th scope="row">1</th>
                <td>{{ $tag->id }}</td>
                <td>{{ link_to_action('TagController@show',$tag->name,['tag' => $tag],['class' => 'label label-default']) }}</td>
                <th>{{ count($tag->posts) }}</th>
                <td>
                    {{ link_to_action('TagController@edit',' -編集-',['id' => $tag->id]) }}
                    {{ Form::open(['url' => '/tag/'.$tag->id, 'method' => 'delete'],['class' => 'form-inline']) }}
                    <input type="submit" value="-削除-" class="delete-btn form-inline">
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection