<?php
require("../config.php");
require(ROOT_DIR."/src/database.php");

session_start();

$name = $_GET["name"];
$surname = $_GET["surname"];
$date = $_GET["date"];
$email = $_GET["email"];
$username = $_GET["username"];

if ($username == null || $username == "") {
    echo "Username cannot be empty!";
} else if ($name == null || $name == "") {
    echo "Name cannot be empty!";
} else if ($surname == null || $surname == "") {
    echo "Surname cannot be empty!";
} else if ($email == null || $email == "" || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    echo "Email is invalid!";
} else {
    $sql = 'SELECT 1 FROM users WHERE username = ?';
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($username));
        $row = $stmt->fetch();

        // if no  match the username is not used
        if ($row==null||$username==$_SESSION["username"]) {
            // add to database
            try {
                $stmt = $conn->prepare('UPDATE users SET username=?, name=?, surname=?, email=?, birthday=? WHERE username=?');
                $stmt->execute([$username, $name, $surname, $email, $date, $_SESSION["username"]]);
                $_SESSION["username"] = $username;
            } catch (Exception $e) {
                echo $e;
                die();
            }
            header('Location:' . ROOT_URL . '/account');
        } else {
            $_SESSION["updateError"] =  "Username already taken!";
            header('Location:' . ROOT_URL . '/account/update?name=' . $name . '&surname=' . $surname . '&date=' . $date . '&email=' . $email . '&username=' . $username);
        }
    } catch (Exception $e) {
        echo $e;
    };
}
