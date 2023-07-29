
@extends('layout')


@section('content')
  <div class="col-md-9">
    <div id="main-content">
      <h1 class="confirm-title">確認ページ</h1>

      <h2 class="confirm-subtitle">入力内容</h2>

      <form class="confirm-form" method="POST" action="{{ route('list.create') }}">
        @csrf

        <div class="form-group">
          <label for="name">名前 : </label>
          {{ $inputs['name'] }}
          <input type="hidden" class="form-control" id="name" name="name" value="{{ $inputs['name'] }}" readonly>
        </div>
        <div class="form-group">
          <label for="name2">フリガナ : </label>
          {{ $inputs['name2'] }}
          <input type="hidden" class="form-control" id="name2" name="name2" value="{{ $inputs['name2'] }}" readonly>
        </div>

        <div class="form-group">
          <label for="categories">カテゴリー : </label>
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
          <label for="review">レビュー : </label>
          {{ $inputs['review'] }}
          <input type="hidden" class="form-control" id="review" name="review" value="{{ $inputs['review'] }}" readonly>
        </div>
        <div class="form-group">
          <label for="comment">コメント : </label>
          {!! nl2br(e($inputs['comment'])) !!}
          <input type="hidden" class="form-control" id="comment" name="comment" value="{{ $inputs['comment'] }}" readonly>
        </div>
        <div class="form-group">
          <label for="callNumber">電話番号 : </label>
          {{ $inputs['callNumber'] }}
          <input type="hidden" class="form-control" id="callNumber" name="callNumber" value="{{ $inputs['callNumber'] }}" readonly>
        </div>

        <button type="submit" name="action" value="submit" class="btn btn-primary">登録する</button>
        <button type="submit" name="action" value="back">修正</button>
      </form>
    </div>
  </div>
@endsection
