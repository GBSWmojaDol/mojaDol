<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MojaDoll</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>
<body>
    <header class="welcome-header">
        <h1 class="welcome-header__title">Welcome to MojaDoll</h1>
    </header>

    <form id="login-form" action="{{url('/')}}/" method="post" onsubmit="return onSubmit()">
        @method('post')
        @csrf
        <input name="username" type="text" placeholder="Id" />
        <input name="password" type="password" placeholder="Password" />
        <input type="submit" value="Log In" />
    </form>
    <div id="create-form">
        <a href="{{url('/')}}/register">Create Account</a>
    </div>
</body>
<script src="https://kit.fontawesome.com/97a77746ec.js" crossorigin="anonymous"></script>
<script>
    function onSubmit() {
        let username = document.querySelector('input[name="username"]');
        let password = document.querySelector('input[name="password"]');

        if (username.value.length == 0) {
            alert('아이디를 확인해주세요');
            return false;
        }

        if (password.value.length == 0) {
            alert('비밀번호를 확인해주세요');
            return false;
        }

         return true;
    }
</script>
</html>
