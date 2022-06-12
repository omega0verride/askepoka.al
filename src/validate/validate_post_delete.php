<?php
session_start();
require("../config.php");
require(ROOT_DIR . "/src/auth.php");
require(ROOT_DIR . "/src/database.php");

$redirect = ROOT_URL . '/account';
$id = $_GET["id"];
if (isset($_GET["redirect"])){
    $redirect=$_GET["redirect"];
}

try {
    $stmt = $conn->prepare('DELETE FROM posts WHERE postId=? and username=?;');
    $stmt->execute([$id, getAuthUsername()]); // getAuthUsername assures the user can c=only delete its posts 
    echo $id.getAuthUsername();
    $row = $stmt->fetch();
} catch (Exception $e) {
    echo $e;
    die();
}
header('Location:' . $redirect);

