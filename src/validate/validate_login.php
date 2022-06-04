<?php

session_start();
include("../database.php");

$username = $_GET["username"];
$password = $_GET["password"];

if ($username === null || $username === "") {
    echo "Username cannot be empty!";
    exit();
}
if ($password === null || $password === "") {
    echo "Password cannot be empty!";
    exit();
} else {
    $sql = 'SELECT password FROM users WHERE username="' . $username . '"';

    try {
        $stmt = $conn->query($sql);
        $row = $stmt->fetch();

        if ($row == null || $row["password"] !== md5($password)) {
            echo "Password or username did not match!";
            $_SESSION["error"] = "Password or username did not match!";
            header('Location:../../login_register.php');
            die();
        }
        $_SESSION["username"] = $username;
        $_SESSION["hashedPass"] = $row["password"];
        if (isset($_GET["remember_credentials"])) {
            setcookie("username", $username, time() + (86400 * 30), "/"); // save credentials for 30 days unless the user logs out
            setcookie("hashedPass", md5($password), time() + (86400 * 30), "/"); // save credentials for 30 days unless the user logs out
        }
        if (isset($_GET["redirect"])) {
            header('Location:'.$_GET["redirect"]);
        } else {
            header('Location:../../account.php');
        }
    } catch (Exception $e) {
        echo $e;
    };
}
