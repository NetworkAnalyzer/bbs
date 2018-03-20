<!-- 新規投稿処理を行うページ -->

@extends('default')

@section('js')
    <script src="https://code.jquery.com/jquery-1.5.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('/js/tag-it.js') }}" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
    <link href="{{ asset('/css/jquery.tagit.css') }}" rel="stylesheet" type="text/css">
@endsection

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