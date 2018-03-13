<!-- タグの新規追加処理を行うページ -->

@extends('default')

@section('title')
    BBS -新規タグ-
@endsection

@section('content')

@section('headline')
    新規タグ
@endsection

<div class="form-group">
    {{ link_to('/tag', 'タグ一覧', ['class' => 'btn btn-primary']) }}
</div>

<div class="post-part">
    {{ Form::open(['method' => 'post']) }}
    {{ csrf_field() }}

        <!-- タグ名 -->
        <div class="form-group post-title">
            <div class="form-headline">タグ名&nbsp;<span class="label label-danger">必須</span></div>
            {{ Form::text('name','',['class' => 'form-control','placeholder' => 'タグ名を入力してください']) }}
        </div>

        <!-- 投稿ボタン -->
        <div class="form-group">
            {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
        </div>

    {{ Form::close() }}
</div>

@endsection