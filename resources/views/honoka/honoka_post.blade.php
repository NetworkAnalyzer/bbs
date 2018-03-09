@extends('honoka.honoka')

@section('title')
    BBS -新規投稿-
@endsection

@section('content')
    {{-- 投稿フォーム--}}
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-8">
                <div class="well bs-component" style="background:white;">
                    <form class="form-horizontal">
                        <fieldset>
                            {{ Form::open(['method' => 'post']) }}
                            {{ csrf_field() }}

                            <div class="form-group" style="margin-bottom: 0;">
                                <div class="col-lg-12">
                                    <textarea class="form-control" rows="3" id="textArea"></textarea>
                                    <span class="help-block">注意事項</span>
                                </div>
                            </div>
                            <div>
                                <p>{{ Form::submit('投稿する', ['class' => 'btn btn-primary']) }}</p>
                            </div>
                            {{ Form::close() }}
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        {{-- 投稿一覧--}}
        <div class="bs-docs-section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bs-component">
                        @foreach($posts as $post)
                            {{-- 投稿を表示 --}}
                            <div class="jumbotron">
                                <h1>{{ $post->title }}</h1>
                                <p>{{ $post->content }}</p>
                                <p><a class="btn btn-primary" style="margin:10px 0;">詳細をみる</a></p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection