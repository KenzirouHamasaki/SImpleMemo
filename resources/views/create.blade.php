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
              <li class="list-group-item {{ request()->is('categories') ? 'active' : '' }}"><a href="/categories">カテゴリー管理</a></li>
          </ul>
        </div>
            <!-- メインコンテンツ -->
        <div id="main-content" class="center-form">
          <div class="card">
              <div class="card-header">登録</div>
              <div class="card-body">
                <form action="{{ isset($item) ? route('list.update', $item->id) : route('list.create') }}" method="POST">
                  @csrf

                  @if(isset($item))
                      @method('PUT')
                  @endif

                      <div class="form-group">
                          <label for="name">店名</label>
                          <input type="text" class="form-control" id="name" name="name" maxlength="20" value="{{ isset($item) ? $item->name : old('name') }}" required>
                      </div>
      
                      <div class="form-group">
                          <label for="name2">店名 フリガナ</label>
                          <input type="text" class="form-control" id="name2" name="name2" maxlength="40" value="{{ isset($item) ? $item->name2 : old('name2') }}" required>
                      </div>
      
                        <div class="form-group">
                            <label>カテゴリー</label>
                            @foreach($categories as $category)
                                <div>
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                        @if(in_array($category->id, $selectedCategories)) checked @endif>
                                    <label>{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
      
                      <div class="form-group">
                          <label for="review">レビュー</label>
                          <select class="form-control" id="review" name="review" value="{{ isset($item) ? $item->review : old('review') }}">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                          </select>
                      </div>
      
                      <div class="form-group">
                          <label for="callNumber">電話番号</label>
                          <input type="text" class="form-control" id="callNumber" name="callNumber" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" value="{{ isset($item) ? $item->callNumber : old('callNumber') }}" required>
                          <small class="form-text text-muted">例: 123-4567-8901</small>
                      </div>
      
                      <div class="form-group">
                          <label for="comment">コメント(300文字以内の入力)</label>
                          <textarea class="form-control" id="comment" name="comment" maxlength="300" required>{{ isset($item) ? $item->comment : old('comment') }}</textarea>
                      </div>
      
                      <button type="submit" class="btn btn-primary">登録</button>
                    </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</body>
