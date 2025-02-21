<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth/register_step2.css')}}">
    <title>体重データの入力</title>
</head>
<body>
    <div class="register-form">
        <h1 class="register-form__heading">PiGLy</h1>
        <h2>新規会員登録</h2>
        <p>STEP2 体重データの入力</p>

        <div class="register-form__inner">
            <form class="register-form__form" action="/weight_logs" method="post">
                @csrf
                <div class="register-form__group">
                    <label class="register-form__label" for="weight">現在の体重</label>
                    <input class="register-form__input" type="text" name="weight" id="weight" placeholder="現在の体重を入力" value="{{ old('weight') }}" /><span class="kg">kg</span>
                    <p class="register-form__error-message">
                        @error('weight')
                        {{ $message }}
                        @enderror
                        </p>
                </div>
                <div class="register-form__group">
                    <label class="register-form__label" for="target_weight">目標の体重</label>
                    <input class="register-form__input" type="text" name="target_weight" id="target_weight" placeholder="目標の体重を入力" value="{{ old('target_weight') }}" /><span class="kg">kg</span>
                    <p class="register-form__error-message">
                        @error('target_weight')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <input class="register-form__button" type="submit" value="アカウント作成">
            </form>
        </div>
    </div>
</body>
</html>