<!-- タグの検索結果を表示するページ -->

@extends('default')

@section('title')
    BBS タグ:{{ $tag->name }}
@endsection

@section('content')

@section('headline')
    {{ Form::label('tag-title',$tag->name,['class' => 'label label-default']) }}
@endsection

<div class="post-list">
    <!-- 投稿の表示 -->
    @if($posts->first() == null)
        <div class="post-part">
            <div class="post-head">
            </div>
            <div class="post-body post-not-exist">
                投稿はありません
            </div>
        </div>
    @else
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
    @endif

    <div>
        {{ $posts->links() }}
    </div>

</div>

@endsection