<?php
    session_start();

    function checkAuth(){
        if (isset($_SESSION["username"]) && isset($_SESSION["hashedPass"])) {
            return true;
        }
        if (isset($_COOKIE["username"]) && isset($_COOKIE["hashedPass"])) {
            $_SESSION["username"] = $_COOKIE["username"];
            $_SESSION["hashedPass"] = $_COOKIE["hashedPass"];
            return true;
        }
        return false;
    }

    function getAuth(){
        if (checkAuth()){
            return [$_SESSION["username"], $_SESSION["hashedPass"]];
        }
    }

    function getAuthUsername(){
        if (checkAuth()){
            return $_SESSION["username"];
        }
    }

    function getAuthHashedPassword(){
        if (checkAuth()){
            return $_SESSION["hashedPass"];
        }
    }
?>
