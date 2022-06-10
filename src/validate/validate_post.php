<?php
session_start();
require("../config.php");
require(ROOT_DIR . "/src/database.php");


$title = $_GET["title"];
$content = $_GET["content"];


if ($title == null || $title == "") {
    $_SESSION["postError"] = "Title cannot be empty!";
    header('Location:' . ROOT_URL . '/post?content=' . $content);
} else if ($content == null || $content == "") {
    $_SESSION["postError"] =  "Content cannot be empty!";
    header('Location:' . ROOT_URL . '/post?title=' . $title);
} else if (strlen($title) > 100) {
    $_SESSION["postError"] =  "Title cannot be longer than 100 characters!";
    header('Location:' . ROOT_URL . '/post?title=' . $title . '&content=' . $content);
} else if (strlen($content) > 20000) {
    $_SESSION["postError"] =  "Content cannot be longer than 20 000 characters!";
    header('Location:' . ROOT_URL . '/post?title=' . $title . '&content=' . $content);
} else {
    try {
        $stmt = $conn->prepare('INSERT INTO posts (postId, title, content, username, timestampPosted, timestampUpdated)
    VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([null, $title, $content, $_SESSION["username"], null, null]);
    } catch (Exception $e) {
        echo $e;
        die();
    }
    header('Location:' . ROOT_URL . '/account');
}
