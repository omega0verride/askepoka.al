<?php
session_start();
require("../config.php");
require(ROOT_DIR . "/src/auth.php");
require(ROOT_DIR . "/src/database.php");


$id = $_GET["id"];

try {
    $stmt = $conn->prepare('DELETE FROM posts WHERE postId=? and username=?;');
    $stmt->execute([$id, getAuthUsername()]);
    $row = $stmt->fetch();
    print_r($row);
} catch (Exception $e) {
    echo $e;
    die();
}
// header('Location:' . ROOT_URL . '/account');

