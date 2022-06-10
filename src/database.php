<?php
# please do not use these credentials for malicious intentions
# the database will be changed after a few days and this connection will no longer be available
# we used this one on dev to share the same data
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