<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить новый ЖК</title>
</head>
<body>
<h1>Добавить ЖК</h1>
<form action="" method="post">
    <input type="text" name="name" placeholder="Название">
    <input type="text" name="address" placeholder="Адресс">
    <input type="text" name="latitude" placeholder="Широта">
    <input type="text" name="longitude" placeholder="Долгота">
    <select name="layout">
        <?php foreach ($layouts as $layout): ?>
        <option value="<?= $layout['id'] ?>"><?= $layout['path'] ?></option>
        <?php endforeach;?>
    </select>
    <input type="submit" value="Добавить">
</form>
</body>
</html>