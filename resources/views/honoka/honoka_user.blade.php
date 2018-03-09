@extends('honoka.honoka')

@section('title')
    BBS -ユーザ情報-
@endsection

@section('content')

    {{-- 投稿一覧--}}
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-8">
                <div class="page-header">
                    <h1 id="container">投稿一覧</h1>
                </div>
                <div class="bs-component">
                    {{-- 投稿を表示 --}}
                    <div class="jumbotron">
                        <h1>nojiri</h1>
                        <p>ヤフー株式会社は、日本の企業。ソフトバンクグループの連結子会社。 ポータルサイトのYahoo! JAPANを運営しており、サイト内の広告・ブロードバンド関連の事業やネットオークション事業等を収益源としている。</p>
                        <p><a class="btn btn-primary btn-lg">詳細をみる</a></p>
                    </div>

                    <div class="jumbotron">
                        <h1>nojiri</h1>
                        <p>ヤフー株式会社は、日本の企業。ソフトバンクグループの連結子会社。 ポータルサイトのYahoo! JAPANを運営しており、サイト内の広告・ブロードバンド関連の事業やネットオークション事業等を収益源としている。</p>
                        <p><a class="btn btn-primary">詳細をみる</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection