<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Планировки</title>
</head>
<body>
<h1>Планировки</h1>
<a href="/layouts/create">+ Добавить планировку</a>
<table>
    <thead>
    <tr>
        <td>#</td>
        <td>Путь</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($layouts as $layout) :?>
    <tr>
        <td><?=$layout['id']?></td>
        <td><?=$layout['path']?></td>
        <td>
            <a href="/layouts/<?=$layout['id']?>/edit">Редактировать</a>
            <a href="/layouts/<?=$layout['id']?>">Удалить</a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>