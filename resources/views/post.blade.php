<!-- 新規投稿処理を行うページ -->

@extends('default')

@section('title')
    BBS -新規投稿-
@endsection

@section('content')

    @section('headline')
        新規投稿
    @endsection

    <div class="form-group">
        {{ link_to('/index', '投稿一覧', ['class' => 'btn btn-primary']) }}
    </div>

    <div class="post-part">
    {{ Form::open(['method' => 'post']) }}
    {{ csrf_field() }}

        <!-- ユーザ名 -->
        <div class="form-group post-title">
            <div class="form-headline">タイトル&nbsp;<span class="label label-danger">必須</span></div>
            {{ Form::text('title','',['class' => 'form-control','placeholder' => 'タイトルを入力してください']) }}

            {{-- error message --}}
            @if ($errors->has('title'))
                <span class="error-message">{{ $errors->first('title') }}</span>
            @endif
        </div>

        <!-- 投稿内容 -->
        <div class="form-group post-content">
            <div class="form-headline">投稿内容&nbsp;<span class="label label-danger">必須</span></div>
            {{ Form::textarea('content','',['class' => 'form-control','placeholder' => '投稿内容を入力してください']) }}

            {{-- error message--}}
            @if ($errors->has('content'))
                <span class="error-message">{{ $errors->first('content') }}</span>
            @endif
        </div>

        <!-- タグ -->
        <div class="form-group post-content">
            <div class="form-headline">タグ&nbsp;</div>
            @foreach($tags as $tag)
                {{Form::checkbox('select-tag[]', $tag->id)}}<span style="font-size: 15px;">&nbsp{{ $tag->name }}</span><br/>
            @endforeach
         </div>

        <!-- 投稿ボタン -->
        <div class="form-group">
            {{ Form::submit('投稿する', ['class' => 'btn btn-primary']) }}
        </div>

        {{ Form::close() }}

    </div>

@endsection