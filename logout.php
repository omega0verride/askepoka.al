<?php 
    session_start();
    session_destroy();
    // setcookie("username", "", time()-3600, "/");
    // setcookie("hashedPass", "", time()-3600, "/");
    // remove all cookies as requested by the exercise
    foreach ( $_COOKIE as $key => $value ){
        setcookie($key, "", time()-3600, '/' );
    }
    header('Location:login.php');
?>