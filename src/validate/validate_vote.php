<?php
require("../config.php");
require(ROOT_DIR . "/src/database.php");
require(ROOT_DIR . "/src/auth.php");

if (!checkAuth()) {
    die();
}


$postId = $_GET["postId"];
$value = $_GET["value"];
$username = $_SESSION["username"];
$sql = 'SELECT voteId, value FROM votes WHERE username = ? AND postId = ?';

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $postId]);
    $row = $stmt->fetch();

    if ($value == 0) {
        if ($row != null) {
            $sql = 'DELETE FROM votes WHERE voteId=?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$row["voteId"]]);
        }
    } else {
        if ($row == null) {
            $sql = 'INSERT INTO votes (voteId, postId, username, value, timestampSubmitted) VALUES (null, ?, ?, ?, null)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$postId, $username, $value]);
        } else if ($row["value"] !== $value) {
            $sql = 'UPDATE votes SET value=? WHERE voteId=?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$value, $row["voteId"]]);
        }
    }
} catch (Exception $e) {
    echo $e;
};
