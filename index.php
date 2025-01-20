<?
if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['userage'])) {

    $username = htmlentities($_POST['username']);
    $userage = htmlentities($_POST['userage']);

    try {
        $conn = new PDO("mysql:host=MySQL-8.2;dbname=Users", "root", "");
        echo "Connected successfully";
        
        $sql = "INSERT INTO `users` (`name`, `age`) VALUES ('$username', $userage)";
        $rowsAdded = $conn->exec($sql);
        if ($rowsAdded > 0) {
            echo "Данные успешно добавлены - Имя: $username, Возраст: $userage";
        }  
    }
    catch(PDOException $e) {
    // Выводит сообщение об ошибке
    echo "Connection failed: " . $e->getMessage();
    }
}
?>

<h4>Создание нового пользователя</h4>
<form method="post">
    <input name="username" placeholder="Имя" id="username">
    <input type="number" name="userage" placeholder="Возраст" id="userage">
    <input type="submit" name="submit" value = "Save">
</form>