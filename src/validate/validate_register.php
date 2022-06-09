<?php
session_start();
require("../config.php");
require(ROOT_DIR."/src/database.php");


$name = $_GET["name"];
$surname = $_GET["surname"];
$date = $_GET["date"];
$email = $_GET["email"];
$username = $_GET["username"];
$password = $_GET["password"];
$confirmPassword = $_GET["confirmPassword"];

$formData = array("name" => $name, "surname" => $surname, "date" => $date, "email" => $email, "username" => $username);
setcookie("register", serialize($formData), time() + (60 * 60), "/"); // save the form data for max 1h

if ($username == null || $username == "") {
    $_SESSION["registerError"] = "Username cannot be empty!";
    header('Location:'.ROOT_URL.'/register');
} else if ($name == null || $name == "") {
    $_SESSION["registerError"] =  "Name cannot be empty!";
    header('Location:'.ROOT_URL.'/register');
} else if ($surname == null || $surname == "") {
    $_SESSION["registerError"] =  "Surname cannot be empty!";
    header('Location:'.ROOT_URL.'/register');
} else if ($email == null || $email == "" || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    $_SESSION["registerError"] =  "Email is invalid!";
    header('Location:'.ROOT_URL.'/register');
} else if ($password == null || $password == "" || strlen($password) < 8) {
    $_SESSION["registerError"] =  "Password invalid!";
    header('Location:'.ROOT_URL.'/register');
} else if ($confirmPassword == null || $confirmPassword == "") {
    $_SESSION["registerError"] =  "You need to confirm your password!";
    header('Location:'.ROOT_URL.'/register');
} else if ($confirmPassword !== $password) {
    $_SESSION["registerError"] =  "Passwords do not match!";
    header('Location:'.ROOT_URL.'/register');
} else {

    $sql = 'SELECT 1 FROM users WHERE username = ?';
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($username));
        $row = $stmt->fetch();

        // if no  match the username is not used
        if ($row == null) {
            // add to database
            try {
                $stmt = $conn->prepare('INSERT INTO users (username, name, surname, role, email, birthday, password)
    VALUES (?, ?, ?, ?, ?, ?, ?)');
                $hashedpass = md5($password);
                $stmt->execute([$username, $name, $surname, 1, $email, $date, $hashedpass]);
                $_SESSION["username"] = $username;
                $_SESSION["hashedPass"] = $hashedpass;
            } catch (Exception $e) {
                echo $e;
                die();
            }
            try {
                $fileName = "var/log/logins.json";
                $file = fopen($fileName, "a+");
                if (!$file) {
                    throw new Exception('File open failed.');
                }
                fwrite($file, "{\"username\": \"" . $username . "\", \"timestamp\": " . time() . "},\n");
                fclose($file);
            } catch (Exception $e) {
                echo "Error: " . $e;
            }
            header('Location:'.ROOT_DIR.'/account');
        } else {
            $_SESSION["registerError"] =  "Username already taken!";
            header('Location:'.ROOT_URL.'/register');
        }
    } catch (Exception $e) {
        echo $e;
    };
}
