<!-- 全てのページに共通する部分を書く -->

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8" />

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <title>@yield('title')</title>

</head>

<body>

<header>
    <div class="col-xs-10 col-xs-offset-1">
        <div class="navbar-header">
                <a href="/" class="site-title">BBS</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li>{{ link_to('/index', 'Top') }}</li>
                    <li>{{ link_to('/user', 'Username') }}</li>
                    <li>{{ link_to('/login', 'Logout') }}</li>
                    <li>{{ link_to('/post', '投稿する') }}</li>
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