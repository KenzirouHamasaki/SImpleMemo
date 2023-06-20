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
              <h2>お店リスト</h2>
              <p><?php echo date('m月d日'); ?>こんにちは！</p>
              <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>店名</th>
                        <th>カテゴリー</th>
                        <th>レビュー</th>
                        <th>コメント</th>
                        <th>詳細</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->review }}</td>
                            <td>{{ $item->comment }}</td>
                            <td>
                              <a href="{{ route('list.content', ['id' => $item->id]) }}" class="btn btn-primary">詳細</a>
                            </td>
                            <td><a href="{{ route('list.edit', $item->id) }}" class="btn btn-primary">編集</a></td>
                            <td>
                              <form action="{{ route('list.delete', $item->id) }}" method="POST" style="display: inline-block;">
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
  </div>
</body>

