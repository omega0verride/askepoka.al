<?php
session_start();

include("includes/database.php");


$title = $_GET["title"];
$name = $_GET["name"];
$surname = $_GET["surname"];
$date = $_GET["date"];
$email = $_GET["email"];
$username = $_GET["username"];
$password = $_GET["password"];
$confirmPassword = $_GET["confirmPassword"];

$formData = array("title" => $title, "name" => $name, "surname" => $surname, "date" => $date, "email" => $email, "username" => $username);
setcookie("register", serialize($formData), time() + (60 * 60), "/"); // save the form data for max 1h

if ($username == null || $username == "") {
    $_SESSION["error"] = "Username cannot be empty!";
    header('Location:register.php');
} else if ($name == null || $name == "") {
    $_SESSION["error"] =  "Name cannot be empty!";
    header('Location:register.php');
} else if ($surname == null || $surname == "") {
    $_SESSION["error"] =  "Surname cannot be empty!";
    header('Location:register.php');
} else if ($email == null || $email == "" || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    $_SESSION["error"] =  "Email is invalid!";
    header('Location:register.php');
} else if ($password == null || $password == "" || strlen($password) < 8) {
    $_SESSION["error"] =  "Password invalid!";
    header('Location:register.php');
} else if ($confirmPassword == null || $confirmPassword == "") {
    $_SESSION["error"] =  "You need to confirm your password!";
    header('Location:register.php');
} else if ($confirmPassword !== $password) {
    $_SESSION["error"] =  "Passwords do not match!";
    header('Location:register.php');
} else {

    $sql = 'SELECT 1 FROM users WHERE username="' . $username . '"';
    try {
        $stmt = $conn->query($sql);
        $row = $stmt->fetch();
        
        // if no  match the username is not used
        if ($row == null) {
            // add to database
            try {
                $statement = $conn->prepare('INSERT INTO users (username, name, surname, title, email, birthday, password)
    VALUES (?, ?, ?, ?, ?, ?, ?)');
                $hashedpass = md5($password);
                $statement->execute([$username, $name, $surname, $title, $email, $date, $hashedpass]);
                $_SESSION["username"] = $username;
                $_SESSION["hashedPass"] = $hashedpass;
            } catch (Exception $e) {
                echo $e;
                die();
            }
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
            header('Location:account.php');
        }
        else{
            $_SESSION["error"] =  "Username already taken!";
            header('Location:register.php');
        }
    } catch (Exception $e) {
        echo $e;
    };
}
