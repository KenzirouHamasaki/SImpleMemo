
@extends('layout')

@section('content')
  <div class="col-md-9">
    <div id="main-content">
      <h1>お店の詳細</h1>
      <h1>{{ $item->name }}</h1>
      <h2>{{ $item->name2 }}</h2>
      <p>カテゴリー: 
        @foreach($item->categories as $category)
          {{ $category->name }}
        @endforeach
      </p>
      <p>レビュー: {{ $item->review }}</p>
      <p>電話番号: {{ $item->callNumber}}</p>
      <p>コメント: {{ $item->comment }}</p>
    </div>
  </div>
@endsection
