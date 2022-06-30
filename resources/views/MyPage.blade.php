<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <header class="status-header">
        <div class="s_column status-header__column">
            <p class="status-header__column__name">My Page</p>
        </div>
    </header>
    <header class="status-header2"></header>
    <main class="main-screen">
        <div class="main-screen__profile">
            <div class="main-screen__profile__img"></div>
            <div class="main-screen__profile__tool">
                <p class="main-srceen__profile__nickname" id="nickname">{{ session('nickname') }}({{ session('user') }})</p><br/>
                <a href="{{ url('/') }}/user/update"><p class="main-screen__profile__change">회원 수정</p></a>
            </div>
        </div>
        <div class="main-screen__reviewck">
            <h3>My review</h3>
            <input type="checkbox" name="allcheck">
        </div>
        <div class="main-screen__review">

        </div>
        <div class="main-screen__delete">
            <p>리스트 삭제</p>
        </div>
        <div class="main-screen__erase">
            <p>
                <a href="{{ url('/') }}/user/delete">계정 삭제</a>
            </p>
        </div>
    </main>
    <nav class="nav">
        <ul class="nav-list">
            <li class="nav__btn"><a class="nav__link" href="{{ url('/') }}/Main"><img src="{{ URL::asset('img/home.png') }}" alt="home"></a></li>
            <li class="nav__btn"><a class="nav__link" href="{{ url('/') }}/shop/create"><img src="{{ URL::asset('img/plus.png') }}" alt="plus"></a></li>
            <li class="nav__btn"><a class="nav__link" href="{{ url('/') }}/MyPage"><img src="{{ URL::asset('img/user-black.png') }}" alt="user-black"></a></a></li>
        </ul>
    </nav>
</body>
<script src="https://kit.fontawesome.com/97a77746ec.js" crossorigin="anonymous"></script>
</html>
