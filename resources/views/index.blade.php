<!-- 投稿を表示するページ -->

@extends('default')

@section('post')

@endsection

@section('title')
    BBS -スレッド一覧-
@endsection

@section('content')

@section('headline')
    スレッド一覧
@endsection

<div class="post-list">
    <!-- 投稿の表示 -->
    @foreach($threads as $thread)
        <div class="post-part">
            <div class="post-head">
                {{-- ユーザ名とユーザIDを表示する --}}
                {{ link_to('/index/' . $thread->id, $thread->name, ['class' => 'post-head-left']) }}
                <span class="post-head-right">{{ $thread->created_at }}</span>
            </div>
        </div>
    @endforeach

    <div>
        {{ $threads->links() }}
    </div>
</div>

@endsection