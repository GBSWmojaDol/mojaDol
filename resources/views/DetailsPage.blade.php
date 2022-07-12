<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details page</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>

<body style="margin: 0px">
    <header class="search-header">
        <div id="search">
            <div class="icon-search1">
                <a href="{{ url('/') }}/Main"><img src="{{ URL::asset('img/right-arrow.png') }}"
                        alt="arrow"class="arrow-icon"></a>
            </div>
        </div>
    </header>
    <main class="main-screen">
        <div class="main-screen__image">
            <img src="{{ URL::asset('img/Domino.jpg') }}" alt="pizza">
        </div>
        <div class="main-screen__store-name">
            <p>{{ $data->shop_name }}</p>
        </div>
        <div class="main-screen__store-info">
            <ul>
                <li class="main-screen__store-info-todo">
                    <p class="store-info">전화번호</p>
                    <p class="store-details-info">
                        {{ $data->tel_num1 }}-{{ $data->tel_num2 }}-{{ $data->tel_num3 }}</p>
                </li>
                <li class="main-screen__store-info-todo">
                    <p class="store-info">화장실</p>
                    <p class="store-details-info">
                        @if ($data->toilet_bool)
                            O
                        @else
                            X
                        @endif
                    </p>
                </li>
                <li class="main-screen__store-info-todo">
                    <p class="store-info">포장</p>
                    <p class="store-details-info">
                        @if ($data->package_bool)
                            O
                        @else
                            X
                        @endif
                    </p>
                </li>
                <li class="main-screen__store-info-todo">
                    <p class="store-info">WIFI</p>
                    <p class="store-details-info">
                        @if ($data->internet_bool)
                            O
                        @else
                            X
                        @endif
                    </p>
                </li>
                <li class="main-screen__store-info-todo">
                    <p class="store-info">예약</p>
                    <p class="store-details-info">
                        @if ($data->reserv_bool)
                            O
                        @else
                            X
                        @endif
                    </p>
                </li>
                <li>
                    <p class="store-location">위치안내</p>
                    <p class="store-location-info">{{ $data->shop_addr }} {{ $data->shop_addr2 }}</p>
                </li>
            </ul>
        </div>
        <button class="main-screen__menu-accordion">가게 메뉴</button>
        <ul class="main-screen__todoList">
            <h3>메뉴 정보</h3>
        </ul>
        <button class="main-screen__menu-accordion">리뷰</button>
        <ul class="main-screen__todoList review-list">
        </ul>
        <ul class="main-screen__last-info">
            <li>
                <p class="store-info">글 작성일</p>
                <p class="store-details-info">{{ $data->write_day }}</p>
            </li>
            <li>
                <p class="store-info">최근 수정</p>
                <p class="store-details-info">
                    @if ($data->edit_day !== null)
                        {{ $data->edit_day }}
                    @endif
                </p>
            </li>
            <li>
                <p class="store-info">관련주소</p>
                <p class="store-details-info">
                    @if ($data->site_addr)
                        {{ $data->site_addr }}
                    @endif
                </p>
            </li>
        </ul>
    </main>
</body>
<script src="https://kit.fontawesome.com/97a77746ec.js" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/accordion.js') }}"></script>
<script>
    let url = "{{env('URL'))shop/menu/" + {{ $data->shop_idx }};
    fetch(url, {
        headers: {
            access_token: "{{env('ACCESS_TOKKEN')}}"
        }
    }).then((response) => response.json()).then(
        (datas) => {
            const ul = document.querySelector('.main-screen__todoList');

            for (const data of datas) {
                const li = document.createElement("li");
                const div = document.createElement("div");
                const p1 = document.createElement("p");
                const p2 = document.createElement("p");
                const b = document.createElement("b");
                const img = document.createElement("img");

                console.log(data.img_address);

                b.innerHTML = data.name;
                p1.appendChild(b);
                p2.innerHTML = parseInt(data.price).toLocaleString() + "원";
                div.appendChild(p1);
                div.appendChild(p2);
                img.src = '/' + data.img_address;
                li.appendChild(div);
                li.appendChild(img);
                ul.appendChild(li);
            }
        }
    );

    fetch('{{env('URL')}}review/show/' + {{ $data->shop_idx }}, {
        headers: {
            access_token: "{{env('access_tokken')}}",
            user: "{{session('user')}}",
        }
    }).then((response) => response.json()).then(
        (datas) => {

            const ul = document.querySelector('.review-list');
            let cnt = 1;
            for (let data of datas) {
                const li = document.createElement("li");
                const div1 = document.createElement("div");
                const div2 = document.createElement("div");
                const div3 = document.createElement("div");
                const p = document.createElement("p");
                const input = document.createElement("input");
                const label = document.createElement("label");
                const i = document.createElement("i");
                const i2 = document.createElement("i");
                const pre = document.createElement("pre");
                const img = document.createElement("img");
                if (data.checked === 1 && data.checked !== undefined) input.checked = true;

                label.onclick = (e) => clickReviewGood(e);
                i2.onclick = (e) => clickReviewReport(e);

                i.classList.add("fa-solid");
                i.classList.add("fa-thumbs-up");
                i.classList.add("checking" + cnt);
                i.id = "like-btn" + cnt;
                i2.classList.add("fa-solid");
                i2.classList.add("fa-bell");
                div3.classList.add("report-reivew");
                input.type = "radio";
                input.id = "checking" + cnt;
                label.htmlFor = "checking" + cnt;
                div2.classList.add("like-rating");
                pre.innerHTML = data.content;
                img.src = "/" + data.img_address;
                i.value = data.id;
                i2.value = data.id;
                cnt++;

                label.appendChild(i);
                div2.appendChild(input);
                div2.appendChild(label);
                p.appendChild(pre);
                div1.appendChild(p);
                div1.appendChild(div2);
                div1.appendChild(i2);
                li.appendChild(div1);
                li.appendChild(img);
                ul.appendChild(li);
            }
            const li = document.createElement('li');
            const button = document.createElement('button');

            button.id = "show-review";
            button.innerHTML = "리뷰 작성 하기"
            li.appendChild(button);
            ul.appendChild(li);
            button.onclick = (e) => AddReview({{$data->shop_idx}});

            /*
            <li><button id="show-review">리뷰 작성 하기</button></li>
            */
        }
    );

    function AddReview(idx) {
        location.href="/shop/review/" + idx
    }

    function clickReviewGood(e) {
        fetch('{{env('URL')}}review/good/' + e.target.value, {
            headers: {
                access_token: "{{env('access_tokken')}}",
                user: "{{session('user')}}",
            }
        }).then((response) => {
            if (response.status === 200) {
                alert('성공하였습니다.')
                document.querySelector('#' + e.target.classList[2]).checked = true;
            } else if (response.status === 400) {
                alert('이미 좋아요를 누르셧습니다.')
                document.querySelector('#' + e.target.classList[2]).checked = true;
            } else {
                alert('실패했습니다.');
                document.querySelector('#' + e.target.classList[2]).checked = false;
            }
        })
    }

    function clickReviewReport(e) {
        fetch('http://127.0.0.1:8000/api/review/report/' + e.target.value, {
            headers: {
                access_token: "{{env('access_tokken')}}",
                user: "{{session('user')}}",
            }
        }).then((response) => {
            if (response.status === 200) {
                alert('성공하였습니다.')
            } else if (response.status === 400) {
                alert('이미 신고하기를 누르셧습니다.')
            } else {
                alert('실패했습니다.');
            }
        })
    }
</script>

</html>
