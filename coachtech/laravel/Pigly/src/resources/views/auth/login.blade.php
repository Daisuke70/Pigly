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
        <div class="login-form__title">
            <h1 class="login-form__heading">PiGLy</h1>
            <h2 class="login-form__heading2">ログイン</h2>
        </div>

        <div class="login-form__inner">
            <form class="login-form__form" action="/login" method="post">
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
                <div class="login-form__button">
                    <input class="login" type="submit" value="ログイン">
                </div>
            </form>
            <a href="/register/step1" class="create-account">アカウント作成はこちら</a>
        </div>
    </div>
</body>
</html>