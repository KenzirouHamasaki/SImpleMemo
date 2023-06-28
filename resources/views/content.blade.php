<!DOCTYPE html>
<html>
    <head>
        <title>ダッシュボード | {{ config('app.name', 'Laravel')}}</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>

<body>
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-3 p-0">
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
        <div class="col-md-9">
            <div id="main-content">
              <h1>お店の詳細</h1>
              <p><?php echo date('m月d日'); ?>こんにちは！</p>
              <h1>{{ $item->name }}</h1>
              <h2>{{ $item->name2 }}</h2>
              <p>カテゴリー: 
                @foreach($item->categories as $category)
                  {{ $category->name }}
                @endforeach
              </p>
              <p>レビュー: {{ $item->review }}</p>
              <p>電話番号: {{ $item->callNumber}}</p>
              <p>コメント: {{ $item->comment }}</p>
          </div>
        </div>
    </div>
</div>
</body>
