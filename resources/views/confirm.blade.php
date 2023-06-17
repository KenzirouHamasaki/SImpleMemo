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
                    
                    <!-- サイドバー -->
                    <ul class="list-group">
                        <li class="list-group-item {{ request()->is('top') ? 'active' : '' }}"><a href="/top">MENU</a></li>
                        <li class="list-group-item {{ request()->is('list') ? 'active' : '' }}"><a href="/list">お店リスト</a></li>
                        <li class="list-group-item {{ request()->is('list/create', 'list/*/edit') ? 'active' : '' }}"><a href="/list/create">新規登録/編集</a></li>
                        <li class="list-group-item {{ request()->is('#') ? 'active' : '' }}">カテゴリー管理</li>
                    </ul>
                </div>

                <!-- メインコンテンツ -->
                <div id="main-content" class="center-form">
                    <div class="card">
                        <div class="card-header">確認画面</div>
                        <div class="card-body">
                            <h3>以下の内容で登録しますか？</h3>
                            <ul>
                              <li>店名: {{ $itemData['name'] ?? '' }}</li>
                              <li>店名フリガナ: {{ $itemData['name2'] ?? '' }}</li>
                              <li>カテゴリー: {{ implode(', ', $itemData['category'] ?? []) }}</li>
                              <li>レビュー: {{ $itemData['review'] ?? '' }}</li>
                              <li>電話番号: {{ $itemData['callNumber'] ?? '' }}</li>
                              <li>コメント: {{ $itemData['comment'] ?? '' }}</li>
                          </ul>
                          
                            <form action="{{ route('create.confirm') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">登録する</button>
                            </form>
                            <form action="{{ route('list.createForm') }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-secondary">修正する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
