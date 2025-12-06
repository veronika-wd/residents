<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить изображение</title>
</head>
<body>
<h1>Добавить изображение</h1>
<form action="/images/create" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" value="Добавить">
</form>
</body>
</html>