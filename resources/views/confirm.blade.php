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
              <h1>確認ページ</h1>

              <h2>入力内容</h2>

              <form method="POST" action="{{ route('list.create') }}">
                @csrf

                <div class="form-group">
                    <label for="name">名前</label>
                    {{ $inputs['name'] }}
                    <input type="hidden" class="form-control" id="name" name="name" value="{{ $inputs['name'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name2">フリガナ</label>
                    {{ $inputs['name2'] }}
                    <input type="hidden" class="form-control" id="name2" name="name2" value="{{ $inputs['name2'] }}" readonly>
                </div>

                <div class="form-group">
                  <label for="categories">カテゴリー</label>
                  <ul>
                      @foreach($inputs['categories'] as $categoryId)
                          @php
                              $category = \App\Category::find($categoryId);
                          @endphp
                          @if($category)
                              <li>
                                  <input type="hidden" class="form-control" id="category_{{ $category->id }}" name="categories[]" value="{{ $categoryId }}">
                                  {{ $category->name }}
                              </li>
                          @endif
                      @endforeach
                  </ul>
                </div>
                <div class="form-group">
                    <label for="review">レビュー</label>
                    {{ $inputs['review'] }}
                    <input type="hidden" class="form-control" id="review" name="review" value="{{ $inputs['review'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="comment">コメント</label>
                    {!! nl2br(e($inputs['comment'])) !!}
                    <input type="hidden" class="form-control" id="comment" name="comment" value="{{ $inputs['comment'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="callNumber">電話番号</label>
                    {{ $inputs['callNumber'] }}
                    <input type="hidden" class="form-control" id="callNumber" name="callNumber" value="{{ $inputs['callNumber'] }}" readonly>
                </div>

                <button type="submit" name="action" value="submit" class="btn btn-primary">登録する</button>
                <button type="submit" name="action" value="back">修正</button>
              </form>
          </div>
        </div>
    </div>
</div>
</body>
