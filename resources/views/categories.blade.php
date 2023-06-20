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
              <form action="{{ route('categories.create') }}" method="POST">
                @csrf
                <input type="text" name="category_name">
                <button type="submit">登録</button>
              </form>
              
              <table class="table">
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
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-primary">編集</a>
                        </td>
                        <td>
                            <form action="{{ route('categories.delete', ['category' => $category->id]) }}" method="POST" onsubmit="return confirm('削除してもよろしいですか？')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('削除してもよろしいですか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
  </div>
