<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
<script>

    window.onload = function() {
        fetch('http://127.0.0.1:8000/api/search/min', {
        headers: {
            access_token: "test_access_token"
        }
    }).then((response) => response.json()).then(
        (data)=>console.log(data)
    );
    }

</script>
</html>
