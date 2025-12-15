<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактировать планировку</title>
</head>
<body>
<h1>Редактировать планировку</h1>
<form action="/layouts/<?= $layout['id'] ?>/edit" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" value="Редактировать">
</form>
</body>
</html>