<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=php_test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT `name`, `email`, `phone` FROM users";
$result = $conn->query($sql);
$users =  $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($users);
