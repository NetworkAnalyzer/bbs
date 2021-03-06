<!-- 投稿を表示するページ -->

@extends('default')

@section('title')
    BBS -投稿詳細-
@endsection

@section('post')
    <li>{{ link_to('/index/'.$post->thread->id.'/post','投稿する') }}</li>
@endsection

@section('content')

    @section('headline')
        投稿詳細
    @endsection

   <div class="post-list">

        <div class="post-part">
            <div class="post-head">
                <span class="post-head-left">{{ $post->user->name }}</span>
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
                    @can('edit', $post)
                        {{ link_to_action('PostController@edit',   ' -編集-',['thread' => $post->thread->id,'post' => $post->id]) }}

                        {{ Form::open(['url' => '/index/'.$post->thread->id.'/'.$post->id, 'method' => 'delete'],['class' => 'form-inline']) }}
                        <input type="submit" value="-削除-" class="delete-btn form-inline">
                        {{ Form::close() }}
                    @endcan
                </div>
            </div>
        </div>
    </div>

@endsection