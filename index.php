<?
try {
    $conn = new PDO("mysql:host=MySQL-8.2", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    // $sql = "CREATE DATABASE if not exists Users";
    // $conn->exec($sql);
    // echo "Database created successfully";

    $sql = "USE Users; INSERT INTO users (name, age) VALUES 
	('John Doe', 3),
	('Jane Doe', 4),
	('John Doe', 5),
	('Jane Doe', 6),
	('John Doe', 7),
	('Jane Doe', 8),
	('John Doe', 9),
	('Jane Doe', 10),
	('John Doe', 11),
	('Jane Doe', 12),
	('John Doe', 13),
	('Jane Doe', 14)
	";
    $conn->exec($sql);
    echo "Table created successfully";
    $conn = null;
}
catch(PDDException $e) {
    echo "Connection failed: " . $e->getMessage();
}
