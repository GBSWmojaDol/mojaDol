<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/699db093f5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/Search.css') }}">
    <title>Search</title>
</head>
<style>
    .bottom-header {
        text-align: center;
    }
    *{
        text-decoration: none;
    }
</style>

<body>
    <header class="main-header">
        <div id="search">
            <div class="icon-search">
                <div>
                    <a href="{{ url('/') }}/Main">
                        <i class="fa-solid fa-arrow-left fa-2x"></i>
                    </a>
                </div>
                <div class="sfield">
                    <input type="text" placeholder="검색할 식당을 입력하세요." class="search-box sinput" media="screen"
                        name="value" onkeyup="if(window.event.keyCode==13){onClick()}">
                    <input type="button" id="search-btn" onclick="onClick()">
                    <label for="search-btn"><i class="fa-solid fa-magnifying-glass icon sicon"></i></label>
                </div>
                <div></div>
            </div>
        </div>
    </header>
    <header class="bottom-header">

    </header>

</body>
<script>
    function onClick() {
        let value = document.querySelector('[name="value"]').value;

        fetch('http://127.0.0.1:8000/api/search/' + value, {
            headers: {
                access_token: "{{env('access_tokken')}}"
            }
        }).then((response) => response.json()).then(
            (datas) => {
                if (datas.length == 0) {
                    if (document.querySelector(".bottom-header") !== null) {
                        document.querySelector(".bottom-header").remove()
                    }
                        let header = document.createElement("header");
                        header.classList.add("bottom-header");
                        document.querySelector("body").appendChild(header);
                        let p = document.createElement("p");
                        p.innerHTML = "검색한 식당의 결과를 찾을 수 없습니다.";
                        p.id = "NotFound_Text";
                        let img = document.createElement("img");
                        img.src = "img/ban.png";
                        img.id = "NotFound-icon";
                        img.width = "200"

                        document.querySelector(".bottom-header").appendChild(img);
                        document.querySelector(".bottom-header").appendChild(p);
                } else {
                    if (document.querySelector(".bottom-header") !== null) {
                        document.querySelector(".bottom-header").remove()
                    }
                    let header = document.createElement("header");
                    header.classList.add("bottom-header");
                    for (let i = 0; i < datas.length; i++) {
                        let div1 = document.createElement("div");
                        let a = document.createElement("a");
                        let p = document.createElement("p");
                        div1.classList.add("store-layout");
                        p.classList.add("store_addr");
                        a.classList.add("store_name");
                        a.innerHTML = datas[i].title;
                        a.href = "/shop/list/" + datas[i].id;
                        console.log(datas[i].addr + datas[i].addr2)
                        p.innerHTML = datas[i].addr + datas[i].addr2

                        let br = document.createElement("br");
                        a.appendChild(p);
                        div1.appendChild(a);
                        div1.appendChild(br);

                        header.appendChild(div1);
                    }
                    document.querySelector("body").appendChild(header);
                }
            }
        );
    }
</script>

</html>
