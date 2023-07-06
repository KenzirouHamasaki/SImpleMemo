
@extends('layout')


@section('content')
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
@endsection
