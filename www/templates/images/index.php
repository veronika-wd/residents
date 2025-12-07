<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Изображения</title>
</head>
<body>
<h1>Изображения</h1>
<a href="/images/create"><button type="button" class="btn btn-success">+ Добавить изображение</button></a>
<table class="table table-striped">
    <thead>
    <tr>
        <td>ID</td>
        <td>Путь</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($images as $image) :?>
    <tr>
        <td><?=$image['id']?></td>
        <td><?=$image['path']?></td>
        <td>
            <a href="/images/<?=$image['id']?>/edit"><button type="button" class="btn btn-secondary">Редактировать</button></a>
            <a href="/images/<?=$image['id']?>"><button type="button" class="btn btn-danger">Удалить</button></a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>