
@extends('layout')


@section('content')
    <div class="col-md-9">
        <div id="main-content">
            <form class="category-form" action="{{ route('categories.create') }}" method="POST">
                @csrf
                <input type="text" name="category_name">
                <button type="submit">登録</button>
            </form>
            <div class="category-list">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>カテゴリー名</th>
                            <th>編集</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">{{ $loop->iteration }}</td>
                                <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">{{ $category->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-primary">編集</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('categories.delete', ['category' => $category->id]) }}" method="POST" onsubmit="return confirm('削除してもよろしいですか？')">
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
