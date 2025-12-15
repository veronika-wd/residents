<form action="/apartments/<?=$apartment['id']?>/edit" method="post">
    <h1 class="mb-3">Редактировать квартиру</h1>

    <div class="mb-3">
        <label for="rooms" class="form-label">Комнаты</label>
        <input type="text" name="rooms" id="rooms" class="form-control" value="<?=$apartment['rooms']?>" placeholder="Комнаты">
    </div>

    <div class="mb-3">
        <label for="floor" class="form-label">Этаж</label>
        <input type="text" name="floor" id="floor" class="form-control" value="<?=$apartment['floor']?>" placeholder="Этаж">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Цена</label>
        <input type="text" name="price" id="price" class="form-control" value="<?=$apartment['price']?>" placeholder="Цена">
    </div>

    <div class="mb-3">
        <label for="build_id" class="form-label">Строение</label>
        <select name="build_id" id="build_id" class="form-select">
            <?php foreach ($builds as $build): ?>
                <option value="<?= $build['id'] ?>"><?= $build['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="layout" class="form-label">Планировка</label>
        <select name="layout" id="layout" class="form-select">
            <?php foreach ($layouts as $layout): ?>
                <option value="<?= $layout['id'] ?>"><?= $layout['path'] ?></option>
            <?php endforeach;?>
        </select>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Фото</label>
        <select name="image" id="image" class="form-select">
            <?php foreach ($images as $image): ?>
                <option value="<?= $image['id'] ?>"><?= $image['path'] ?></option>
            <?php endforeach;?>
        </select>
    </div>

    <input type="submit" value="Редактировать" class="btn btn-success">
</form>