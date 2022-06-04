<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />
</head>

<body>
    <nav>
        <a href="#" id="selectedMenu" class="menus">Home</a>
        <a href="account.php" class="menus">Account</a>
        <a href="login.php" class="menus">Login</a>
        <a href="register.php" class="menus">Register</a>
        <a href="logout.php" class="menus">Log Out</a>
    </nav>


    <?php
    require("src/auth.php");
    if (checkAuth()) {
        echo "<p><b>Welcome</b></p>";
    } else {
        include("templates/login_prompt.html");
    }
    ?>
</body>

</html>