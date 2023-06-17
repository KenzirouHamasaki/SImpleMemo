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
            
            <!-- メニューリスト -->
            <ul class="list-group">
              <li class="list-group-item {{ request()->is('top') ? 'active' : '' }}"><a href="/top">MENU</a></li>
              <li class="list-group-item {{ request()->is('list') ? 'active' : '' }}"><a href="/list">お店リスト</a></li>
              <li class="list-group-item {{ request()->is('list/create', 'list/*/edit') ? 'active' : '' }}"><a href="/list/create">新規登録/編集</a></li>
              <li class="list-group-item {{ request()->is('category') ? 'active' : '' }}"><a href="/category">カテゴリー管理</a></li>
          </ul>
        </div>
        <div class="col-md-9">
            <div id="main-content">
              <h2>デフォルトのコンテンツ</h2>
              <p><?php echo date('m月d日'); ?>こんにちは！</p>
          </div>
        </div>
    </div>
</div>
</body>
