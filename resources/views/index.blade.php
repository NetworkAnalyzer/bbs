<!-- 投稿を表示するページ -->

@extends('default')

@section('title')
    BBS -投稿一覧-
@endsection

@section('content')

    @section('headline')
        投稿一覧
    @endsection

    <div class="post-list">
         <!-- 投稿の表示 -->
        @foreach($posts as $post)
            <div class="post-part">
                <div class="post-head">
                    {{-- ユーザ名とユーザIDを表示する --}}
                    <span class="post-head-left">{{ $post->title }}</span>
                    <span class="post-head-right">{{ $post->created_at }}</span>
                </div>
                <div class="post-body">
                    <span>{{ $post->content }}</span>
                </div>
                <div class="post-footer form-inline">
                    <div>
                        @foreach($post->tags as $tag)
                            {{ link_to('/tag/'.$tag->id,$tag->name,['tag' => $tag,'class' => 'label label-default']) }}
                        @endforeach
                    </div>
                    <div>
                        {{ link_to_action('PostController@show', '詳細を見る',['id' => $post->id]) }}
                    </div>
                    <div>
                        @can('edit', $post)
                            {{ link_to_action('PostController@edit',   ' -編集-',['id' => $post->id]) }}

                            {{ Form::open(['url' => '/post/'.$post->id, 'method' => 'delete'],['class' => 'form-inline']) }}
                            <input type="submit" value="-削除-" class="delete-btn form-inline">
                            {{ Form::close() }}
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>

        <div class="form-group">
            {{ link_to('/post', '投稿する', ['class' => 'btn btn-primary']) }}
        </div>

    </div>

@endsection