<?php
$hostnameDB = "localhost";
$usernameDB = "root";
$passwordDB = "";
$databaseName = "webtech";
global $conn;
$conn = null;
try {

    $conn = new PDO("mysql:host=$hostnameDB;dbname=$databaseName", $usernameDB, $passwordDB);
    
} catch (PDOException $e) {

    echo $e->getMessage();
}
?>