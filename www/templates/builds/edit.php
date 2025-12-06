<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактировать новое Строение</title>
</head>
<body>
<h1>Редактировать Строение</h1>
<form action="/builds/<?=$build['id']?>/edit" method="post">
    <input type="text" name="name" value="<?=$build['name']?>" placeholder="Название">
    <input type="date" name="planning_date" value="<?=$build['planning_date']?>" placeholder="Срок сдачи">
    <input type="number" name="floors" value="<?=$build['floors']?>" placeholder="Количество этажей">
    <select name="residentId">
        <?php foreach ($residents as $resident):?>
            <option value="<?=$resident['id']?>" <?= $resident['id'] === $build['resident_id'] ? 'selected' : '' ?>><?=$resident['name']?></option>
        <?php endforeach;?>
    </select>
    <input type="submit" value="Редактировать">
</form>
</body>
</html>