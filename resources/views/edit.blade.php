<!-- 投稿を編集するページ -->

@extends('default')

@section('title')
    BBS -投稿編集-
@endsection

@section('content')

    @section('headline')
        投稿編集
    @endsection

     <div class="post-part">
        {{ Form::open(['url' => '/post/'.$post->id, 'method' => 'put']) }}

            <!-- 投稿内容 -->
            <div class="form-group post-content">
                <div class="form-headline">投稿内容&nbsp;<span class="label label-danger">必須</span></div>
                {{ Form::textarea('content',$post->content,['class' => 'form-control','placeholder' => '投稿内容を入力してください']) }}

                {{-- error message--}}
                @if ($errors->has('content'))
                    <span class="error-message">{{ $errors->first('content') }}</span>
                @endif
            </div>

            <div class="form-group post-content">
                <!-- 現在のタグ -->
                <div class="form-headline">現在のタグ</div>
                @if($post->tags()->first() == null)
                    なし
                @else
                    @foreach($post->tags as $tag)
                        {{ link_to('/tag/'.$tag->id,$tag->name,['class' => 'label label-default']) }}
                    @endforeach
                @endif

                <!-- タグ -->
                <div class="form-group post-content">
                    <div class="form-headline">タグ</div>
                    @foreach($tags as $tag)
                        {{Form::checkbox('select-tag[]', $tag->id)}}<span style="font-size: 15px;">&nbsp{{ $tag->name }}</span><br/>
                    @endforeach
                </div>
            </div>

            <!-- 投稿ボタン -->
            <div class="form-group">
                {{ Form::submit('更新する', ['class' => 'btn btn-primary']) }}
            </div>

        {{ Form::close() }}

    </div>

@endsection