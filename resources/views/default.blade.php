<!-- 全てのページに共通する部分を書く -->

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    {{--各ページで必要なjsだけ読み込む--}}
    @yield('js')

    <title>@yield('title')</title>
</head>

<body>

<header>
    <div class="col-xs-10 col-xs-offset-1">

        <div class="navbar-header">
            <a href="/index" class="site-title">BBS</a>
        </div>

        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li>{{ link_to('/index', 'Top') }}</li>
                <li>{{ link_to('/user',  Auth::user()->name) }}</li>
                <li>{{ link_to('/login', 'Logout') }}</li>
                @yield('post')
                <li>{{ link_to('/tag', 'タグ') }}</li>
            </ul>
        </div>
    </div>
</header>

<div class="col-xs-10 col-xs-offset-1">

    <div class="headline">
        <h2>@yield('headline')</h2>
    </div>

    {{-- @section('content')〜@endsectionまでが挿入される --}}
    @yield('content')

</div>

<div id="footer">

</div>

</body>

</html>