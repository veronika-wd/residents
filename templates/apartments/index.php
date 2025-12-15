<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Квартиры</title>
</head>
<body>
<h1>Квартиры</h1>
<hr>
<a href="/apartments/create"><button type="button" class="btn btn-success">+ Добавить квартиру</button></a>
<table class="table table-striped">
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
            <a href="/apartments/<?=$apartment['id']?>/edit"><button type="button" class="btn btn-secondary">Редактировать</button></a>
            <a href="/apartments/<?=$apartment['id']?>"><button type="button" class="btn btn-danger">Удалить</button></a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>