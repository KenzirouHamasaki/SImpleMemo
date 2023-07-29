
@extends('layout')


@section('content')
<div class="col-md-9" style="height: 100vh;">
  <div id="main-content">
    <h2 class="list">お店リスト</h2>
      <div class="lists">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>店名</th>
              <th>カテゴリー</th>
              <th>レビュー</th>
              <th>コメント</th>
              <th>詳細</th>
              <th>編集</th>
              <th>削除</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($items as $item)
            <tr>
              <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">{{ $loop->iteration }}</td>
              <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">{{ $item->name }}</td>
              <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                @foreach($item->categories as $category)
                  {{ $category->name }}
                @endforeach
              </td>
              <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">{{ $item->review }}</td>
              <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">{{ $item->comment }}</td>
              <td class="text-center" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                <a href="{{ route('list.content', ['id' => $item->id]) }}" class="btn btn-primary">詳細</a></td>
              <td class="text-center" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;"><a href="{{ route('list.edit', $item->id) }}" class="btn btn-primary">編集</a></td>
              <td class="text-center">
                <form action="{{ route('list.delete', $item->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('削除してもよろしいですか？')">削除</button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection
