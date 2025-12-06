<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ЖК</title>
</head>
<body>
<h1>Жилые комплексы</h1>
<a href="/residents/create">+ Добавить ЖК</a>
<table>
    <thead>
    <tr>
        <td>#</td>
        <td>Название</td>
        <td>Адрес</td>
        <td>Координаты</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($residents as $resident) :?>
    <tr>
        <td><?=$resident['id']?></td>
        <td><?=$resident['name']?></td>
        <td><?=$resident['address']?></td>
        <td><?=$resident['latitude'], $resident['longitude']?></td>
        <td>
            <a href="/residents/<?=$resident['id']?>/edit">Редактировать</a>
            <a href="/residents/<?=$resident['id']?>">Удалить</a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>