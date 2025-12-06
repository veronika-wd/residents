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
<h1>Строения</h1>
<a href="/builds/create">+ Добавить Строение</a>
<table>
    <thead>
    <tr>
        <td>#</td>
        <td>Название</td>
        <td>Срок сдачи</td>
        <td>Количсетво этажей</td>
        <td>Жилой комплекс</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($builds as $build) :?>
    <tr>
        <td><?=$build['id']?></td>
        <td><?=$build['name']?></td>
        <td><?=$build['planning_date']?></td>
        <td><?=$build['floors']?></td>
        <td><?=$build['resident_name']?></td>
        <td>
            <a href="/builds/<?=$build['id']?>/edit">Редактировать</a>
            <a href="/builds/<?=$build['id']?>">Удалить</a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>