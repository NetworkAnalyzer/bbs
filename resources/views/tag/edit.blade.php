<!-- 投稿を編集するページ -->

@extends('default')

@section('title')
    BBS -タグ編集-
@endsection

@section('content')

@section('headline')
    タグ編集
@endsection

<div class="form-group">
    {{ link_to('/tag', 'タグ一覧', ['class' => 'btn btn-primary']) }}
</div>

<div class="post-part">
{{ Form::open(['url' => '/tag/'.$tag->id, 'method' => 'put']) }}

<!-- ユーザ名 -->
    <div class="form-group post-title">
        <div class="form-headline">タグ名&nbsp;<span class="label label-danger">必須</span></div>
        {{ Form::text('name',$tag->name,['class' => 'form-control','placeholder' => 'タグ名を入力してください']) }}

        {{-- error message --}}
        @if ($errors->has('name'))
            <span class="error-message">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <!-- 更新ボタン -->
    <div class="form-group">
        {{ Form::submit('更新する', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}

</div>

@endsection