<?php
session_start();
require("../config.php");
require(ROOT_DIR . "/src/auth.php");
require(ROOT_DIR . "/src/database.php");

$redirect = ROOT_URL . '/account';
$id = $_GET["id"];
if (isset($_GET["redirect"])) {
    $redirect = $_GET["redirect"];
}

try {
    $authed_user = getAuthUsername();
    $sql = 'SELECT role FROM users WHERE username =  ?';

    $stmt = $conn->prepare($sql);
    $stmt->execute(array($authed_user));
    $row = $stmt->fetch();

    if ($row == null) {
        echo "User not found!";
        $_SESSION["error"] = "User not found!";
        die();
    }

    $role = $row["role"];

    if ($role==0){
        $stmt = $conn->prepare('DELETE FROM posts WHERE postId=?;');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
    }
    else {
        $stmt = $conn->prepare('DELETE FROM posts WHERE postId=? AND username=?;');
        $stmt->execute([$id, $authed_user]); // getAuthUsername assures the user can c=only delete its posts 
        $row = $stmt->fetch();
    }
} catch (Exception $e) {
    echo $e;
    die();
};
header('Location:' . $redirect);
