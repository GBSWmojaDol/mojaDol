<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>
<style>
    a {
        text-decoration: noen;
        color: black;
    }
</style>
<body>
    <header class="status-header">
        <div class="status-header__column"><a title="가게 찾기" href="{{ url('/') }}/search"><img
                    src="{{ URL::asset('img/search.png') }}" alt="search"></a></div>
        <div class="status-header__column"><a title="카테고리" href="{{ url('/') }}/category"><img
                    src="{{ URL::asset('img/menu.png') }}" alt="menu"></a></div>
    </header>
    <header class="status-header2">

    </header>
    <main class="main-screen">
        <div class="main-screen__rel">

                <select name="rel" onchange="onClick()">
                    <option value="desc">높은 별점순</option>
                    <option value="asc">낮은 별점순</option>
                </select>

        </div>
        <div class="main-screen__rel2"></div>

    </main>

    <nav class="nav">
        <ul class="nav-list">
            <li class="nav__btn"><a title="메인페이지 가기" class="nav__link" href="{{ url('/') }}/Main"><img
                        src="{{ URL::asset('img/homeblack.png') }}" alt="home_black"></a></li>
            <li class="nav__btn"><a title="가게 추가" class="nav__link" href="{{ url('/shop/create') }}"><img src="../img/plus.png" alt="plus"></a></li>
            <li class="nav__btn"><a title="유저 정보" class="nav__link" href="{{ url('/') }}/MyPage"><img src="../img/user.png"
                        alt="user"></a></li>
        </ul>
    </nav>
</body>
<script src="https://kit.fontawesome.com/97a77746ec.js" crossorigin="anonymous"></script>
<script>

    let url = "{{env('URL'))shop/" + document.querySelector('[name="rel"]').value;

    window.onload = function() {
        onClick();
    }

    function onClick() {
        fetch(url, {
        headers: {
            access_token: "{{env('access_tokken')}}"
        }
    }).then((response) => response.json()).then(
        (datas) => {
            if (document.querySelector('.store-Recom') !== null)
                document.querySelector('.store-Recom').remove()

            const div1 = document.createElement('div');
            div1.classList.add('store-Recom');

            for (data of datas) {
                const div2 = document.createElement('div');
                const div3 = document.createElement('div');
                const a = document.createElement('a');
                const p1 = document.createElement('p');
                const p2 = document.createElement('p');
                const p3 = document.createElement('p');

                a.href = '/shop/list/' + data.shop_idx;

                div2.classList.add('store-layout');
                div3.classList.add('store-container');
                p1.classList.add('store_name');
                p2.classList.add('store_addr');
                p3.classList.add('store_addr');

                p1.innerHTML = "이름 : " + data.shop_name;
                p2.innerHTML = "주소 : " + data.addr + data.addr2;
                p3.innerHTML = "평균 : " + data.star_avg + "점";

                div3.appendChild(p1);
                div3.appendChild(p2);
                div3.appendChild(p3);
                div2.appendChild(div3);
                a.appendChild(div2);
                div1.appendChild(a);
            }
            document.querySelector('.main-screen').appendChild(div1);
        })
    }
</script>

</html>
