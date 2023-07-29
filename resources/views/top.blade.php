
@extends('layout')


@section('content')
<div class="col-md-9">
  <div id="main-content">
    <p class="hello">{{ date('m月d日') }} {{ Auth::user()->name }}さん、こんにちは！</p>
  </div>
</div>
@endsection
