<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Изображения</title>
</head>
<body>
<h1>Изображения</h1>
<a href="/images/create">+ Добавить изображение</a>
<table>
    <thead>
    <tr>
        <td>#</td>
        <td>Путь</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($images as $image) :?>
    <tr>
        <td><?=$image['id']?></td>
        <td><?=$image['path']?></td>
        <td>
            <a href="/images/<?=$image['id']?>/edit">Редактировать</a>
            <a href="/images/<?=$image['id']?>">Удалить</a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>