<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title><?= $title ?? '' ?></title>
</head>
<body>
<?php if(isset($_SESSION['user_id'])) :?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/residents">ЖК</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/builds">Строения</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/apartments">Квартиры</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/layouts">Планировки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/images">Изображения</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link logout" aria-current="page" href="/logout">Выйти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif;?>
<main class="container mt-5">
    <?= $content ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>