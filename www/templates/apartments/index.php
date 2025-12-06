<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Квартиры</title>
</head>
<body>
<h1>Квартиры</h1>
<a href="/apartments/create">+ Добавить квартиру</a>
<table>
    <thead>
    <tr>
        <td>#</td>
        <td>Комнаты</td>
        <td>Этаж</td>
        <td>Цена</td>
        <td>Строение</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($apartments as $apartment) :?>
    <tr>
        <td><?=$apartment['id']?></td>
        <td><?=$apartment['rooms']?></td>
        <td><?=$apartment['floor']?></td>
        <td><?=$apartment['price']?></td>
        <td><?=$apartment['build_name']?></td>
        <td>
            <a href="/apartments/<?=$apartment['id']?>/edit">Редактировать</a>
            <a href="/apartments/<?=$apartment['id']?>">Удалить</a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>