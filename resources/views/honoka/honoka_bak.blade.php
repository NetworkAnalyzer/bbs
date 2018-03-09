@extends('honoka.honoka')

@section('title')
    BBS -新規投稿-
@endsection

@section('content')
    {{-- 投稿フォーム--}}
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">新規投稿</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">投稿内容</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" id="textArea"></textarea>
                                    <span class="help-block">注意事項</span>
                                </div>
                            </div>
                            <div>
                                <p><a class="btn btn-primary btn-lg">投稿する</a></p>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ユーザ登録フォーム--}}
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">ユーザ登録</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputUsername" class="col-lg-3 control-label">ユーザ名</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">メールアドレス</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-3 control-label">パスワード</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <p><a class="btn btn-primary btn-lg">登録する</a></p>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                        <p><a class="btn btn-primary btn-lg">詳細をみる</a></p>
                        {{-- コメント --}}
                        <div class="col-lg-12">
                            <blockquote>
                                <h2>ユーザ名</h2>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <small>timestamp <cite title="Source Title">斜体になる</cite>
                                    {{-- コメント階層化 --}}
                                    <div class="col-lg-12">
                                        <blockquote>
                                            <h2>ユーザ名</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                            <small>timestamp <cite title="Source Title">斜体になる</cite></small>
                                        </blockquote>
                                    </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection