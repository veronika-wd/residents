<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактировать квартиру</title>
</head>
<body>
<h1>Редактировать квартиру</h1>
<form action="/apartments/<?=$apartment['id']?>/edit" method="post">
    <input type="text" name="rooms" value="<?=$apartment['rooms']?>" placeholder="Комнаты">
    <input type="text" name="floor" value="<?=$apartment['floor']?>" placeholder="Этаж">
    <input type="text" name="price" value="<?=$apartment['price']?>" placeholder="Цена">
    <input type="submit" value="Редактировать">
</form>
</body>
</html>