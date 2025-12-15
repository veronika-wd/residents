<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Строения</title>
</head>
<body>
<h1>Строения</h1>
<hr>
<a href="/builds/create"><button type="button" class="btn btn-success">+ Добавить Строение</button></a>
<table class="table table-striped">
    <thead>
    <tr>
        <td>ID</td>
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
            <a href="/builds/<?=$build['id']?>/edit"><button type="button" class="btn btn-secondary">Редактировать</button></a>
            <a href="/builds/<?=$build['id']?>"><button type="button" class="btn btn-danger">Удалить</button></a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>