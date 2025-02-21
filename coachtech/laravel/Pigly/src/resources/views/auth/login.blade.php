<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
    <title>ログイン画面</title>
</head>
<body>
<div class="login-form">
        <h1 class="login-form__heading">PiGLy</h1>
        <h2>ログイン</h2>

        <div class="login-form__inner">
            <form class="login-form__form" action="/weight_logs" method="post">
                @csrf
                <div class="login-form__group">
                    <label class="login-form__label" for="email">メールアドレス</label>
                    <input class="login-form__input" type="mail" name="email" id="email" placeholder="メールアドレスを入力" value="{{ old('email') }}" />
                    <p class="login-form__error-message">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="login-form__group">
                    <label class="login-form__label" for="password">パスワード</label>
                    <input class="login-form__input" type="password" name="password" id="password" placeholder="パスワードを入力" value="{{ old('password') }}" />
                    <p class="login-form__error-message">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <input class="login-form__button" type="submit" value="ログイン">
            </form>
            <a href="/register/step1">アカウント作成はこちら</a>
        </div>
    </div>
</body>
</html>