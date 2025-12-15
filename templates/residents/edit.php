<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Добавить новый ЖК</title>
</head>
<body>
<h1>Добавить ЖК</h1>
<form action="/residents/<?=$resident['id']?>/edit" method="post" class="row g-3">
    <div class="md-3">
    <input type="text" name="name" value="<?=$resident['name']?>" class="form-control" placeholder="Название">
    </div>
    <div class="md-3">
    <input type="text" name="address" value="<?=$resident['address']?>" class="form-control" placeholder="Адресс">
    </div>
    <div class="md-3">
    <input type="text" name="latitude" value="<?=$resident['latitude']?>" class="form-control" placeholder="Широта">
    </div>
    <div class="md-3">
    <input type="text" name="longitude" value="<?=$resident['longitude']?>" class="form-control" placeholder="Долгота">
    </div>
    <div class="md-3">
        <select name="layout" class="form-select">
        <?php foreach ($layouts as $layout): ?>
            <option value="<?= $layout['id'] ?>"><?= $layout['path'] ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <input type="submit" value="Добавить" class="btn btn-success">
</form>
</body>
</html>