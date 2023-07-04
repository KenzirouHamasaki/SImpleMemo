
<!DOCTYPE html>
<html>
    <head>
        <title>ホーム | {{ config('app.name', 'Laravel')}}</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('first.index') }}">{{ config('app.name', 'Laravel')}}</a>
                <a class="login" href="{{ route('login') }}">ログイン</a>
                <a class="register" href="{{ route('register') }}">新規登録</a>
            </div>
        </nav>
    

    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">会員登録</div>
            <div class="panel-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                  @endforeach
                </div>
              @endif
              <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="email">メールアドレス</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                </div>
                <div class="form-group">
                  <label for="name">ユーザー名</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                  <label for="password">パスワード</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                  <label for="password-confirm">パスワード（確認）</label>
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div>
    </div>
    </body>
