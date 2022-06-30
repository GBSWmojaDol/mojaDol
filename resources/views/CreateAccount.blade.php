<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>Document</title>
</head>
<script src="{{ URL::asset('js/checkInfo.js') }}"></script>
<script src="{{ URL::asset('js/connection.js') }}"></script>

<body>
    <header class="welcome-header">
        <h1 class="account_title welcome-header__title">Create Account</h1>
    </header>
    <form id="login-form" action="{{ url('/') }}/register" method="post" onsubmit="return CheckInfo()">
        @csrf
        @method('post')

        <p class="login-form__p">아이디</p>
        <input class="id" placeholder="Id" name="create_id" type='text' id="id" />
        <input class="login-check" placeholder="LoginCheck" value="Id Check" type="button" onclick="checkId()" />
        <input type="hidden" value="" id="idCheck" />

        <p className="login-form__p">비밀번호</p>
        <input class="pw" placeholder="password" name="create_pw" type='password' />

        <p className="login-form__p">비밀번호 확인</p>
        <input class="pw-chk" placeholder="password check" name="create_pw_chk" type='password' />

        <p class="login-form__p">닉네임</p>
        <input class="nickname" placeholder="nickname" name="nickname" type='text' />

        <p class="login-form__p">주소</p>
        <input class="addr" placeholder="도로명 주소만 입력 가능합니다." name="create_address" type='text' />

        <input class="hidden_addr" name="zipcode" type="hidden">
        <input class="details_addr" placeholder="details-address" name="details_address" type="text" />
        <input type="submit" value="Create-Account" />
    </form>
</body>

<script>
    function checkId() {
        let id = document.querySelector('#id').value;
        let url = 'http://127.0.0.1:8000/api/login/' + id;

        fetch(url, {
            headers: {
                access_token: "{{env('access_tokken')}}"
            }
        }).then((response) => response.json()).then((data) => {
            console.log(data);

            if (data.text === "true") {
            document.querySelector('#idCheck').value = true;
            alert('사용가능한 아이디입니다.')
        } else {
            document.querySelector('#idCheck').value = false;
            alert('사용불가능한 아이디입니다. 바꾸어주세요.')
            document.querySelector('#id').focus();
        }
        });
    }
</script>

</html>
