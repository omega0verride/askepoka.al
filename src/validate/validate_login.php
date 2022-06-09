<?php
require("../config.php");
require(ROOT_DIR ."/src/database.php");

session_start();

$username = $_GET["username"];
$password = $_GET["password"];

if ($username === null || $username === "") {
    echo "Username cannot be empty!";
    # we do not need to send an erro to the end user since he will never reach this point from javascript validations
    # if he bypasses the validations its his fault, the backend does check this anyways
    exit();
}
if ($password === null || $password === "") {
    echo "Password cannot be empty!";
    exit();
} else {
    $sql = 'SELECT password FROM users WHERE username = ?';

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($username));
        $row = $stmt->fetch();

        if ($row == null || $row["password"] !== md5($password)) {
            echo "Password or username did not match!";
            $_SESSION["loginError"] = "Password or username did not match!";
            if (isset($_GET["redirect"])) {
                header('Location:'.ROOT_URL.'/login?redirect=' . $_GET["redirect"]);
            } else {
                header('Location:'.ROOT_URL.'/login');
            }
            die();
        }
        $_SESSION["username"] = $username;
        $_SESSION["hashedPass"] = $row["password"];
        if (isset($_GET["remember_credentials"])) {
            setcookie("username", $username, time() + (86400 * 30), "/"); // save credentials for 30 days unless the user logs out
            setcookie("hashedPass", md5($password), time() + (86400 * 30), "/"); // save credentials for 30 days unless the user logs out
        }
        if (isset($_GET["redirect"]) && $_GET["redirect"] != null) {
            header('Location:' . $_GET["redirect"]);
        } else {
            header('Location:'.ROOT_URL.'/account');
        }
    } catch (Exception $e) {
        echo $e;
    };
}
