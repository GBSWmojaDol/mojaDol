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
    <form action="/shop/create" method="post">
        @csrf
        @method('post')

        <input type="text" name="shop_name"> <br/>
        <input type="text" name="shop_addr"> <br/>
        <input type="text" name="shop_addr2"> <br/>

        <input type="text" name="tel1" maxlength="3">-
        <input type="text" name="tel2" maxlength="4">-
        <input type="text" name="tel3" maxlength="4"> <br/>

        <input type="radio" value="true" name="package" checked>
        <input type="radio" value="false" name="package"> <br/>

        <input type="radio" value="true" name="toilet" checked>
        <input type="radio" value="false" name="toilet"> <br/>

        <input type="radio" value="true" name="internet"  checked>
        <input type="radio" value="false" name="internet"> <br/>

        <input type="radio" value="true" name="reserv" checked>
        <input type="radio" value="false" name="reserv"> <br/>

        <input type="text" name="site_addr">

        <button type="submit" />

    </form>
</body>
</html>
