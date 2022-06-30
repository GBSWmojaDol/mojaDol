<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>
<body>
    <header class="main-header">
        <div id="search">
            <div class="icon-search">
                    <a href="{{ url('/') }}/Main"><img src="{{ URL::asset('img/right-arrow.png') }}" alt="arrow"></a>
                    <p class="category">카테고리</p>
            <div></div>
            </div>
        </div>
        <div id="under-line2"></div>
    </header>
    <header class="status-header2"></header>
    <main class="foodlist main-screen">
        <ul class="main-screen__foodlist">
            <li><img src="{{ URL::asset('img/fish.png') }}" alt="fish"><p>일식</p></li>
            <li><img src="{{ URL::asset('img/chinese-noodle.png') }}" alt="chinese"><p>중식</p></li>
            <li><img src="{{ URL::asset('img/chicken-leg.png') }}" alt="chicken"><p>치킨</p></li>
        </ul>
        <ul class="main-screen__foodlist">
            <li><img src="{{ URL::asset('img/rice.png') }}" alt="rice"><p>밥류</p></li>
            <li><img src="{{ URL::asset('img/cake.png') }}" alt="cake"><p>디저트</p></li>
            <li><img src="{{ URL::asset('img/pizza.png') }}" alt="pizza"><p>피자</p></li>
        </ul>
        <ul class="main-screen__foodlist">
            <li><img src="{{ URL::asset('img/spaghetti.png') }}" alt="spaghetti"><p>양식</p></li>
            <li><img src="{{ URL::asset('img/noodle-bowl.png') }}" alt="noodle"><p>아시안</p></li>
            <li><img src="{{ URL::asset('img/cloudy.png') }}" alt="cloudy"><p>야식</p></li>
        </ul>
        <ul class="main-screen__foodlist">
            <li><img src="{{ URL::asset('img/meat.png') }}" alt="meat"><p>고기</p></li>
            <li><img src="{{ URL::asset('img/hamburger.png') }}" alt="hamburger"><p>패스트푸드</p></li>
            <li><img src="{{ URL::asset('img/pig.png') }}" alt="pig"><p>보쌈</p></li>
        </ul>

        <ul class="main-screen__foodlist">
            <li><img src="{{ URL::asset('img/guitar.png') }}" alt="guitar"><p>기타</p></li>
        </ul>

    </main>
</body>
<script src="https://kit.fontawesome.com/97a77746ec.js" crossorigin="anonymous"></script>
</html>
