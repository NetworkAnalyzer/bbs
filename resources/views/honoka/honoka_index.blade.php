@extends('honoka.honoka')

@section('title')
    BBS -投稿一覧-
@endsection

@section('content')
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
@endsection