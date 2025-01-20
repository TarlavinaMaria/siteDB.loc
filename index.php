<?
if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['userage'])) {

    try {
        $conn = new PDO("mysql:host=MySQL-8.2;dbname=Users", "root", "");
        echo "Connected successfully <br>";
        
        // $sql = "INSERT INTO `users` (`name`, `age`) VALUES (:username, :userage)";
        // $stmt = $conn->prepare($sql);// Подготавливает запрос
        // $stmt->bindValue(':username',$_POST['username']);
        // $stmt->bindValue(':userage',$_POST['userage']);
        // // Выполняет запрос
        // $rowsAdded = $stmt->execute();

        // if($rowsAdded > 0) {
        //     echo "Новый пользователь успешно создан: имя - " . $_POST['username'] . " возраст - " . $_POST['userage'];
        // }

        // 2 вариант
        // $sql = "INSERT INTO `users` (`name`, `age`) VALUES (:username, :userage)";
        // $stmt = $conn->prepare($sql);// Подготавливает запрос
        // $rowsAdded = $stmt->execute(array(':username'=>$_POST['username'], ':userage'=>$_POST['userage']));
        // if($rowsAdded > 0) {
        //         echo "Новый пользователь успешно создан: имя - " . $_POST['username'] . " возраст - " . $_POST['userage'];
        // }

        // 3 вариант
        $sql = "INSERT INTO `users` (`name`, `age`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);// Подготавливает запрос
        $rowsAdded = $stmt->execute(array($_POST['username'], $_POST['userage']));
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
<a href="userList.php">Список пользователей</a>