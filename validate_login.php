<?php

session_start();
include("includes/database.php");

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
            header('Location:login.php');
            die();
        }
        $_SESSION["username"] = $username;
        $_SESSION["hashedPass"] = $row["password"];
        try {
            $fileName = "/var/log/logins.json";
            $file = fopen($fileName, "a+");
            if (!$file) {
                throw new Exception('File open failed.');
            }
            fwrite($file, "{\"username\": \"" . $username . "\", \"timestamp\": " . time() . "},\n");
            fclose($file);
        } catch (Exception $e) {
            echo "Error: " . $e;
        }
        if (isset($_GET["remember_credentials"])) {
            setcookie("username", $username, time() + (86400 * 30), "/"); // save credentials for 30 days unless the user logs out
            setcookie("hashedPass", md5($password), time() + (86400 * 30), "/"); // save credentials for 30 days unless the user logs out
        }
        header('Location:account.php');
    } catch (Exception $e) {
        echo $e;
    };
}
