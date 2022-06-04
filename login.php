<!DOCTYPE html>
<?php
session_start();

if (isset($_COOKIE["username"]) && isset($_COOKIE["hashedPass"])) {
  $_SESSION["username"] = $_COOKIE["username"];
  $_SESSION["hashedPass"] = $_COOKIE["hashedPass"];
}

if (isset($_SESSION["username"]) && isset($_SESSION["hashedPass"])) {
  header('Location:account.php');
  exit();
}



$error = null;
if (isset($_SESSION["error"])) {
  $error = $_SESSION["error"];
}
unset($_SESSION["error"]);

?>

<html>

<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="stylesheet.css" />
  <style>
    label.customLabel {
      display: inline-block;
      width: 150px;
    }

    #login {
      width: 100%;
    }
  </style>
</head>

<body>
  <nav>
    <a href="welcome.php" class="menus">Home</a>
    <a href="account.php" class="menus">Account</a>
    <a href="#" id="selectedMenu" class="menus">Login</a>
    <a href="register.php" class="menus">Register</a>
    <a href="logout.php" class="menus">Log Out</a>
  </nav>

  <div class="centered">
    <div class="container">
      <form name="login" action="validate_login.php" method="get">
        <h1>Login</h1>

        <br>
        <label for="username" class=".customLabel">Username: </label>
        <input type="text" name="username" id="username" class="customInput" required />

        <br>
        <label for="password" class=".customLabel">Password: </label>
        <input type="password" name="password" id="password" class="customInput" required />
        <br>
        <input type="checkbox" id="remember_credentials" name="remember_credentials" style="float: left;">
        <label for="remember_credentials" style="float:left; padding-left:10px; padding-top:1px;">Remember Me</label>

        <br>
        <br>
        <p class="errorText" style="<?php if (isset($error)) echo "display: inline; color: red;";
                                    else echo "display: none;" ?>"><?php echo $error; ?></p>
        <br>
        <br>
        <input type="submit" value="Login" id="login" class="customButton" />

      </form>

      <p>Don't have an account?
      <form action="register.php">
        <input type="submit" class="customButton" value="Register" />
      </form>
      </p>

    </div>
  </div>


  <div class="centered">
    Testing credentials: Username: admin Password: admin123
  </div>
</body>

</html>