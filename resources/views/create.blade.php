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

        <div id="main-content" class="center-form">
          <div class="card">
              <div class="card-header">登録</div>
              <div class="card-body">
                  <form method="POST" action="{{ route('list.index') }}">
                      @csrf
      
                      <div class="form-group">
                          <label for="name">店名</label>
                          <input type="text" class="form-control" id="name" name="name" maxlength="20" required>
                      </div>
      
                      <div class="form-group">
                          <label for="name2">店名 フリガナ</label>
                          <input type="text" class="form-control" id="name2" name="name2" maxlength="40" required>
                      </div>
      
                      <div class="form-group">
                          <label>カテゴリー</label>
                          <div>
                              <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="category1" name="category[]" value="日本食">
                                  <label class="form-check-label" for="category1">日本食</label>
                              </div>
                              <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="category2" name="category[]" value="中華">
                                  <label class="form-check-label" for="category2">中華</label>
                              </div>
                              <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="category3" name="category[]" value="イタリアン">
                                  <label class="form-check-label" for="category3">イタリアン</label>
                              </div>
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="category4" name="category[]" value="インド料理">
                                <label class="form-check-label" for="category4">インド料理</label>
                            </div>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="category4" name="category[]" value="アメリカ料理">
                              <label class="form-check-label" for="category4">アメリカ料理</label>
                          </div>
                          </div>
                      </div>
      
                      <div class="form-group">
                          <label for="review">レビュー</label>
                          <select class="form-control" id="review" name="review">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                          </select>
                      </div>
      
                      <div class="form-group">
                          <label for="callNumber">電話番号</label>
                          <input type="text" class="form-control" id="callNumber" name="callNumber" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" required>
                          <small class="form-text text-muted">例: 123-4567-8901</small>
                      </div>
      
                      <div class="form-group">
                          <label for="comment">コメント(300文字以内の入力)</label>
                          <textarea class="form-control" id="comment" name="comment" maxlength="300" required></textarea>
                      </div>
      
                      <button type="submit" class="btn btn-primary">登録</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</body>
