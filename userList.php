<?
try {
    $conn = new PDO("mysql:host=MySQL-8.2;dbname=Users", "root", "");
    echo "Connected successfully <br>";
    // Удаление
    if (isset($_POST['del_user'])) {
        $sql = "DELETE FROM `users` WHERE `user_id` = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $_POST['id']));
        echo "Пользователь успешно удален";
        unset($_POST['del_user']);
        unset($_POST['id']);
    }
    // Показ всех пользователей
    $sql = "SELECT `user_id`, `name` FROM users";
    $result = $conn->query($sql);

    // $row = $result->fetch(); // возвращает одну строку
    // Выводит все строки
    ?>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th></th>
        </tr>
        <?
        while ($row = $result->fetch()) {
            echo "<tr>";
            echo "<td>{$row['user_id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td><a href='userinfo.php?id={$row['user_id']}'>More info ...</a></td>";
            echo "<td>
                <form method='post' style='display:inline;'>
                    <input type='hidden' name='id' value='{$row['user_id']}'>
                    <input type='submit' value='Delete' name='del_user'>
                </form>
                <a href='edituser.php?id={$row['user_id']}'>Edit</a>
            </td>";

            echo "</tr>";
        }
        ?>
    </table>
<?
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
    <title>Список пользователей</title>
</head>

<body>
    <a href="index.php">Добавить пользователя</a>
</body>

</html>