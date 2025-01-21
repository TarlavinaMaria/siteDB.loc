<?
try {
    $conn = new PDO("mysql:host=MySQL-8.2;dbname=Users", "root", "");
    echo "Connected successfully <br>";

    if (isset($_POST['edit_user'])) {
        $sql = "UPDATE `users` SET `name` = :name, `age` = :age WHERE `user_id` = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['name'],
            ':age' => $_POST['age'],
            ':id' => $_POST['id']
        ));
        echo "Пользователь успешно обновлен";
    }

    $sql = "SELECT * FROM `users` WHERE `user_id` = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':id' => $_GET['id']));

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?= $row['user_id'] ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?= $row['name'] ?>">
            <label for="age">Age:</label>
            <input type="text" name="age" value="<?= $row['age'] ?>">
            <input type="submit" value="Save" name="edit_user">
        </form>
    <?
    } else {
        echo "Пользователь не найден";
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование пользователя</title>
</head>

<body>
    <a href="userList.php">Назад</a>
</body>

</html>