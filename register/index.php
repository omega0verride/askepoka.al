<?php
require("../src/config.php");
header('Location:'.ROOT_URL.'/login?register=&'.$_SERVER['QUERY_STRING']);
?>