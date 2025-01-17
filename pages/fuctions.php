<?php
// Функция регистрации пользователя
function registerUser(string $name, string $email, string $password, string $password_confirmation)
{
    $name = trim(htmlspecialchars($name));
    $email = trim(htmlspecialchars($email));
    $password = trim(htmlspecialchars($password));
    $password_confirmation = trim(htmlspecialchars($password_confirmation));

    $isError = false; // Флаг на ошибки 

    // Проверка на пустые поля
    if ($name == "" || $email == "" || $password == "" || $password_confirmation == "") {
        $isError = true;
        printAlert("Все поля должны быть заполнены");
    }
    // Проверка на пароли
    if ($password != $password_confirmation) {
        $isError = true;
        printAlert("Пароли не совпадают");
    }

    if (strlen($password) < 3 || strlen($password_confirmation) > 30) {
        $isError = true;
        printAlert("Пароль должен быть длиной от 3 до 30 символов");
    }

    $pattern = "/^[a-z0-9_!@$]{3,30}$/i"; // Проверка на корректность пароля
    if (!preg_match($pattern, $password)) {
        $isError = true;
        printAlert("Неподходящий формат пароля, допустимы латинские буквы, цифры, символы ! @ $");
    }
    // Проверка на имя. Имя от 3 до 15 и латинские, кирилица, пробел, тире, числа
    $patternName = "/^[a-zа-я0-9_ -]{3,15}$/iu";
    if (!preg_match($patternName, $name)) {
        $isError = true;
        printAlert("Неподходящий формат имени, допустимы латинские буквы, кирилица, пробел, тире, числа");
    }

    if ($isError) {
        include_once("regform.php");
        exit;
    }
    // Проверка на существование пользователя
    $users = "pages/users.txt";
    $file = fopen($users, "a+"); // Открываем поток в режиме а+
    while (!feof($file)) {
        $line = fgets($file);
        $readedName = substr($line, 0, strpos($line, ":"));

        if ($readedName == $name) {
            printAlert("Пользователь с таким именем уже существует");
            fclose($file);
            include_once("pages/regform.php");
            exit;
        }
    }

    $line = $name . ":" . password_hash($password, PASSWORD_DEFAULT) . ":" . $email . "\n";
    fwrite($file, $line . "\n");
    fclose($file); // Закрываем поток
    printAlert("Вы успешно зарегистрированы", "h3", "green");

}

// Функция входа пользователя
function loginUser(string $name, string $password)
{
    $name = trim(htmlspecialchars($name));
    $password = trim(htmlspecialchars($password));

    $isError = false; // Флаг на ошибки 

    // Проверка на пустые поля
    if ($name == "" || $password == "") {
        $isError = true;
        printAlert("Все поля должны быть заполнены");
    }

    if ($isError) {
        include_once("loginform.php");
        exit;
    }

    // Проверка на существование пользователя
    $users = "pages/users.txt";
    $file = fopen($users, "r"); // Открываем поток в режиме чтения

    $isLoggedIn = false; // Флаг на успешный вход

    while (!feof($file)) {
        $line = fgets($file);
        $lineParts = explode(":", $line); // Разделяем строку на массив

        $readedName = $lineParts[0]; // Получаем имя из массива
        $readedPasswordHash = trim($lineParts[1]); // Получаем хэш пароля из массива

        // Проверка на совпадение имени и пароля и хэш пароля
        if ($readedName == $name && password_verify($password, $readedPasswordHash)) {
            $isLoggedIn = true;
            break;
        }
    }

    fclose($file); // Закрываем поток

    if ($isLoggedIn) {
        printAlert("Вы успешно вошли в систему", "h3", "green"); 
        exit;
    } else {
        printAlert("Неверный логин или пароль");
        include_once("pages/loginform.php");
        exit;
    }
}

function printAlert(string $message, string $tag = "h5", string $color = "red")
{
    echo "<$tag><span style='color: $color'><b>$message</b></span></$tag>";
}
?>