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
            {{ Form::text('tags','',['id' => 'tag-input']) }}
        </div>

        <!-- 投稿ボタン -->
        <div class="form-group">
            {{ Form::submit('投稿する', ['class' => 'btn btn-primary']) }}
        </div>

        {{ Form::close() }}



    </div>

<script type="text/javascript">
    var tagCsv  = "<?php echo $tag_names; ?>";
    var tagList = tagCsv.split(',');

    $('#tag-input').tagit({
        removeConfirmation: true,
        availableTags: tagList
    });
</script>

@endsection