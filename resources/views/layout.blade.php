<!DOCTYPE html>
<html lang="ja">
<head>
    <title>ダッシュボード | {{ config('app.name', 'Laravel')}}</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>


  <div class="container-fluid d-flex flex-column" style="height: 100vh;">
    <div class="row">
        <div class="col-md-3" style="flex: 0 0 auto;">
            <h1>SimpleMemo</h1>
            @if(Auth::check())
              <span class="my-navbar-item">{{ Auth::user()->name }}さん</span>
              
              <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            @else
              <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
              
              <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
            @endif
            <!-- メニューリスト -->
            <ul class="list-group">
              <li class="list-group-item {{ request()->is('top') ? 'active' : '' }}"><a href="/top">MENU</a></li>
              <li class="list-group-item {{ request()->is('list') ? 'active' : '' }}"><a href="/list">お店リスト</a></li>
              <li class="list-group-item {{ request()->is('list/create') ? 'active' : '' }}"><a href="/list/create">新規登録/編集</a></li>
              <li class="list-group-item {{ request()->is('categories') ? 'active' : '' }}"><a href="/categories">カテゴリー管理</a></li>
            </ul>
        </div>
        @yield('content')
    </div>
</div>

@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif


