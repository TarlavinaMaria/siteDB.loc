<!-- Форма профиля -->
<?php
session_start(); // Запуск сессии

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_login'])) {
    header("Location: index.php?page=5"); // Перенаправляем на страницу входа
    exit();
}

// Обработка выхода
if (isset($_POST['logout_btn'])) {
    session_destroy(); // Уничтожаем сессию
    setcookie('user_login', '', time() - 3600, "/"); // Удаляем куки логина
    setcookie('user_password', '', time() - 3600, "/"); // Удаляем куки пароля
    header("Location: ../index.php?page=5"); // Перенаправляем на страницу 
    exit();
}
?>

<h3>Profile Page</h3>
<p>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['user_login']); ?>!</p>
<p>Это страница вашего профиля.</p>
<p>Вы можете выйти из системы, нажав на кнопку ниже.</p>
<form method="POST">
    <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>
</form>