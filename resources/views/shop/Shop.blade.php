<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($data->user_id == session('user'))
        <button>글 쓴 사람만 바꿀 수 있음 ㅋㅋㄹㅃㅃ</button>
    @else
        <button>응 넌 해당 안돼 ㅋㅋ</button>
    @endif

</body>
</html>
