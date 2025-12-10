<h1>Жилые комплексы</h1>
<hr>

<a href="/residents/create"><button type="button" class="btn btn-success">+ Добавить ЖК</button></a>

<table class="table table-striped">
    <thead>
    <tr>
        <td>ID</td>
        <td>Название</td>
        <td>Адрес</td>
        <td>Координаты</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($residents as $resident) :?>
    <tr>
        <td><?=$resident['id']?></td>
        <td><?=$resident['name']?></td>
        <td><?=$resident['address']?></td>
        <td><?= $resident['latitude'] ?> , <?= $resident['longitude'] ?></td>
        <td>
            <a href="/residents/<?=$resident['id']?>/edit"><button type="button" class="btn btn-secondary">Редактировать</button></a>
            <a href="/residents/<?=$resident['id']?>"><button type="button" class="btn btn-danger">Удалить</button></a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>