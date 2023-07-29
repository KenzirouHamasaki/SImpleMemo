
@extends('layout')

@section('content')
  <div class="col-md-9">
    <div id="main-content">
      <h1 class="content-title">お店の詳細</h1>
      <h1 class="content-subtitle">{{ $item->name }}</h1>
      <h2 class="content-subtitle2">{{ $item->name2 }}</h2>
      <p class="content-subtitle">カテゴリー: 
        @foreach($item->categories as $category)
          {{ $category->name }}
        @endforeach
      </p>
      <p class="content-subtitle">レビュー: {{ $item->review }}</p>
      <p class="content-subtitle">電話番号: {{ $item->callNumber}}</p>
      <p class="content-subtitle">コメント: {{ $item->comment }}</p>
    </div>
  </div>
@endsection
