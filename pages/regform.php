<form action="index.php?page=4" method="POST">
    <div class="form-group">
        <label for="login">Логин:</label>
        <input id="login" name="login" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="password_confirmation">Подтверждение пароля:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>
    <button type="submit" name="reg_btn" class="btn btn-primary btn-block">Зарегистрироваться</button>
</form>