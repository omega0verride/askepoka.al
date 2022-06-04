<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>

<body>
    <nav>
        <a href="#" id="selectedMenu" class="menus">Home</a>
        <a href="account.php" class="menus">Account</a>
        <a href="login.php" class="menus">Login</a>
        <a href="register.php" class="menus">Register</a>
		<a href="logout.php" class="menus">Log Out</a>
    </nav>

    <div class="centered">
        <div class="container">
			<?php 
			session_start();
			if (isset($_COOKIE["username"]) && isset($_COOKIE["hashedPass"])) {
                $_SESSION["username"] = $_COOKIE["username"];
                $_SESSION["hashedPass"] = $_COOKIE["hashedPass"];
            }
            if (!isset($_SESSION["username"]) || !isset($_SESSION["hashedPass"])) {
                echo
                "<strong>Please login first.</strong>
            <br><br>
            <form action=\"login.php\">
                <input type=\"submit\" class=\"customButton\" value=\"Login\" />
            </form>";
            } 
			else {
				$welcomeString = $_SESSION["username"];
				if (isset($_GET["username"])&&$_GET["username"]!=="")
					$welcomeString = $_GET["username"];
            	echo "<p><b>Welcome " . $welcomeString . "!</b></p>"; 
				echo '
				<br>
	            <form action='.$_SERVER["PHP_SELF"].' method="GET">
    	            <label for="username">Enter username: </label>
        	        <input name="username" type="text" class="customInput"/><br>
            	    <br>
                	<input type="submit" value="Welcome" class="customButton" />
            	</form>';
			}
		?>
        </div>
    </div>
</body>

</html>