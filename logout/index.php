<?php 
    require("../src/config.php");
    session_start();
    session_destroy();
    setcookie("username", "", time()-3600, "/");
    setcookie("hashedPass", "", time()-3600, "/");
    setcookie("register", "", time()-3600, "/");
    header('Location:'.ROOT_URL.'/login');
?>