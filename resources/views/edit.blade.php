<!-- 投稿を編集するページ -->

@extends('default')

@section('title')
    BBS -投稿編集-
@endsection

@section('content')

    @section('headline')
        投稿編集
    @endsection

    <div class="form-group">
        {{ link_to('/index', '投稿一覧', ['class' => 'btn btn-primary']) }}
    </div>

    <div class="post-part">
        {{ Form::open(['url' => '/post/'.$post->id, 'method' => 'put']) }}

        <!-- ユーザ名 -->
            <div class="form-group post-title">
                <div class="form-headline">タイトル&nbsp;<span class="label label-danger">必須</span></div>
                {{ Form::text('title',$post->title,['class' => 'form-control','placeholder' => 'タイトルを入力してください']) }}

                {{-- error message --}}
                @if ($errors->has('title'))
                    <span class="error-message">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <!-- 投稿内容 -->
            <div class="form-group post-content">
                <div class="form-headline">投稿内容&nbsp;<span class="label label-danger">必須</span></div>
                {{ Form::textarea('content',$post->content,['class' => 'form-control','placeholder' => '投稿内容を入力してください']) }}

                {{-- error message--}}
                @if ($errors->has('content'))
                    <span class="error-message">{{ $errors->first('content') }}</span>
                @endif
            </div>

            <!-- 投稿ボタン -->
            <div class="form-group">
                {{ Form::submit('更新する', ['class' => 'btn btn-primary']) }}
            </div>

            {{ Form::close() }}

    </div>

@endsection