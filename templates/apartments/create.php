<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить квартиру</title>
</head>
<body>
<h1>Добавить квартиру</h1>
<form action="/apartments/create" method="post" enctype="multipart/form-data">
    <input type="text" name="rooms" placeholder="Комнаты">
    <input type="text" name="floor" placeholder="Этаж">
    <input type="text" name="price" placeholder="Цена">
    <select name="build_id">
        <?php foreach ($builds as $build): ?>
            <option value="<?= $build['id'] ?>"><?= $build['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <select name="layout">
        <?php foreach ($layouts as $layout): ?>
            <option value="<?= $layout['id'] ?>"><?= $layout['path'] ?></option>
        <?php endforeach;?>
    </select>
    <input type="file" name="images[]" multiple>
    <input type="submit" value="Добавить">
</form>
</body>
</html>