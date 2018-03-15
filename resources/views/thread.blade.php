<!-- 投稿を表示するページ -->

@extends('default')

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
                <span class="post-head-left">{{ $thread->name }}</span>
                <span class="post-head-right">{{ $thread->created_at }}</span>
            </div>
        </div>
    @endforeach

    <div>
        {{ $threads->links() }}
    </div>
</div>

@endsection