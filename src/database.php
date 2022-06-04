<?php

    
$hostnameDB = "144.172.71.124";
$usernameDB = "admin";
$passwordDB = "askepokaadmin@vpn";
$databaseName = "askepoka";
global $conn;
$conn = null;
try {

    $conn = new PDO("mysql:host=$hostnameDB;dbname=$databaseName", $usernameDB, $passwordDB);
    
} catch (PDOException $e) {

    echo $e->getMessage();
}
?>