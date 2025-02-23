<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGly</title>
    <link rel="stylesheet" href="{{ asset('css/common.css')}}">
    @yield('css')
</head>

<body>
    <div class="app">
        <header class="header">
            <h1 class="header__heading">PiGLy</h1>
        <div class="header__content">
            <div class="weight-setting__content">
                <a href="/weight_logs/goal_setting" class="weight-setting">
                    <img src="{{ asset('/images/setting.png') }}"  alt="設定の画像" class="img-setting"/>
                </a>
                <span class="weight">目標体重設定</span>
            </div>
            <div class="logout">
                <form class="logout__form" action="/logout" method="post">
                    @csrf
                    <button type="submit" class="logout__button">
                        <img src="{{ asset('/images/logout.png') }}" alt="ログアウトの画像" class="img-logout"/>
                        <span class="logout">ログアウト</span>
                    </button>
                </form>
            </div>
        </div>
        </header>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>