<?
try {
    // Показ информации о пользователе по id
    $conn = new PDO("mysql:host=MySQL-8.2;dbname=Users", "root", "");
    echo "Connected successfully <br>";

    $sql = "SELECT * FROM `users` WHERE `user_id` = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':id' => $_GET['id']));

    if ($stmt->rowCount() > 0) {
        ?>
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>age</th>
            </tr>
            <?
            foreach ($stmt as $row) {
                echo "<tr>";
                echo "<td>{$row['user_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['age']}</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?
    } else {
        echo "Пользователь не найден";

    }


} catch (PDOException $e) {
    // Выводит сообщение об ошибке
    echo "Connection failed: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="userList.php">Назад</a>
</body>

</html>