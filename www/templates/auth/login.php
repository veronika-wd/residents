<form action="/login" method="post" class="w-50 m-auto">
    <h1 class="mb-3 text-center">Авторизация</h1>

    <div class="mb-3">
        <label for="login" class="form-label">Логин</label>
        <input type="text" name="login" id="login" class="form-control" placeholder="Логин">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Пароль">
    </div>

    <input type="submit" value="Авторизоваться" class="btn btn-success">
    <a href="/register" class="btn btn-primary">Регистрация</a>
</form>