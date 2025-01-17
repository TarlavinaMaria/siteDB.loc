<?
try {
    $conn = new PDO("mysql:host=MySQL-8.2", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $sql = "CREATE DATABASE if not exists Users";
    $conn->exec($sql);
    echo "Database created successfully";

    $sql = "USE Users;
    CREATE TABLE if not exists Users (
        user_id int primary key auto_increment,
        name varchar(30) ,
        age int
    )";
    $conn->exec($sql);
    echo "Table created successfully";
    $conn = null;
}
catch(PDDException $e) {
    echo "Connection failed: " . $e->getMessage();
}
