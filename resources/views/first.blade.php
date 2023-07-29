<!DOCTYPE html>
<html>
    <head>
        <title>ホーム | {{ config('app.name', 'Laravel')}}</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('first.index') }}">{{ config('app.name', 'Laravel')}}</a>
                <a class="login" href="{{ route('login') }}">ログイン</a>
                <a class="register" href="{{ route('register') }}">新規登録</a>
            </div>
        </nav>
    </body>

    <div class="jumbotron top-img">
        <p class="text-center text-white top-img-text">{{ config('app.name', 'Laravel')}}</p>
    </div>

