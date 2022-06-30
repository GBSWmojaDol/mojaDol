<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>Document</title>
</head>
<script src="../js/checkInfo.js"></script>
<script src="../js/connection.js"></script>
<body>
    <header class="welcome-header">
        <h1 class="account_title welcome-header__title">Modify Account</h1>
    </header>
    <form id="login-form" action="{{ url('/') }}/user/update" method="post" onsubmit="return submitCheck()">
        @csrf
        @method('post')

        <p className="login-form__p">비밀번호</p>
        <input
            class="pw"
            placeholder="password"
            name="create_pw"
            type='password' />
        <p className="login-form__p">비밀번호 확인</p>
        <input
            class="pw-chk"
            placeholder="password check"
            name="create-pw-chk"
            type='password' />
        <p class="login-form__p">닉네임</p>
        <input
            class="nickname"
            placeholder="nickname"
            name="nickname"
            type='text'
            value="{{ $nickname }}"/>

        <p class="login-form__p">주소</p>
        <input
            class="addr"
            placeholder="도로명 주소만 입력 가능합니다."
            name="create_address"
            type='text'
            value="{{ $user_addr }}"
            />
        <input
            class="hidden_addr"
            name="hidden_addr"
            type="hidden"
            value="{{ $addr_num }}">
        <input
            class="details-addr"
            placeholder="details-address"
            name="details_address"
            type="text"
            value="{{ $user_addr2 }}"
        />
        <input type="submit" value="Modify Account" />
    </form>
</body>
<script>
    function submitCheck() {
        let pw = document.querySelector('.pw').value;
        let pw_chk = document.querySelector('.pw_chk').value;
        let nickname = document.querySelector('.nickname').value;
        let addr = document.querySelector('.addr').value;
        let details_addr = document.querySelector('.details-addr').value;

        if (pw === "" || pw_chk === "" || nickname === "" || addr === "" || details_addr === "") {
            alert("공백이 있습니다 확인을 해주세요");
            return false;
        }

        if (pw !== pw_chk) {
            alert("비밀번호와 비밀번호 확인이 다릅니다. 다시 한 번 확인해주세요.");
            return false;
        }

        return true;
    }
</script>
</html>
