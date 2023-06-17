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
              <li class="list-group-item {{ request()->is('#') ? 'active' : '' }}">カテゴリー管理</li>
          </ul>
        </div>
        <div class="col-md-9">
            <div id="main-content">
              <h1>カテゴリー管理/登録</h1>

    <!-- カテゴリー登録 -->
    <form action="{{ route('category.create') }}" method="POST">
        @csrf
        <input type="text" name="category_name" placeholder="カテゴリー名">
        <button type="submit">登録</button>
    </form>

    <!-- カテゴリー一覧表示 -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>カテゴリー名</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}">編集</a>
                    <form action="{{ route('category.delete', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
          </div>
        </div>
    </div>
</div>
</body>
