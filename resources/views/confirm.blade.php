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
              <h1>確認ページ</h1>

              <h2>入力内容</h2>

              <form method="POST" action="{{ route('list.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name2">Name2</label>
                    <input type="text" class="form-control" id="name2" name="name2" value="{{ $item->name2 }}" readonly>
                </div>
                <div class="form-group">
                    <label for="review">Review</label>
                    <input type="text" class="form-control" id="review" name="review" value="{{ $item->review }}" readonly>
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" readonly>{{ $item->comment }}</textarea>
                </div>
                <div class="form-group">
                    <label for="callNumber">Call Number</label>
                    <input type="text" class="form-control" id="callNumber" name="callNumber" value="{{ $item->callNumber }}" readonly>
                </div>
                <div class="form-group">
                    <label for="categories">Categories</label>
                    <ul>
                        @foreach($categories as $category)
                      <li>
                        <input type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }} disabled>
                        <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                      </li>
                        @endforeach
                    </ul>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
              </form>


              <form action="{{ route('list.createForm') }}" method="GET">
                  <button type="submit">修正する</button>
              </form>
          </div>
        </div>
    </div>
</div>
</body>
