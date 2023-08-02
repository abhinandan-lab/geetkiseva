<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geetkiseva"; // utf8mb4_general_ci

// pdo connection
try {
    $connpdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}




?>