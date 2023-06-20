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
              <li class="list-group-item {{ request()->is('list/create') ? 'active' : '' }}"><a href="/list/create">新規登録/編集</a></li>
              <li class="list-group-item {{ request()->is('categories') ? 'active' : '' }}"><a href="/categories">カテゴリー管理</a></li>
          </ul>
        </div>
        <div class="col-md-9">
            <div id="main-content">
              <h1>カテゴリー編集ページ</h1>

              <form action="{{ route('categories.update', $category->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <label for="name">カテゴリー名</label>
                  <input type="text" id="category_name" name="category_name" value="{{ $category->name }}" required>
                  <button type="submit">修正</button>
              </form>

              <a href="{{ route('categories.index') }}">戻る</a>
            </div>
        </div>
    </div>
  </div>
</body>
