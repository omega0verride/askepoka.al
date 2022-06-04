<!DOCTYPE html>
<?php
session_start();

if (isset($_GET['register']))
  $register = "checked";
  //log out if wanting to register
else{
  $register = "";
}

require("src/auth.php");
if (checkAuth()&&$register=="") {
  header('Location:account.php');
  exit();
}



$error = null;
if (isset($_SESSION["error"])) {
  $error = $_SESSION["error"];
}
unset($_SESSION["error"]);

if (isset($_COOKIE["register"])) {
  $formData = unserialize($_COOKIE["register"]);
  $title = $formData["title"];
  $name = $formData["name"];
  $surname = $formData["surname"];
  $date = $formData["date"];
  $email = $formData["email"];
  $username = $formData["username"];
}

if (isset($_GET["title"]))
  $title = $_GET["title"];
if (isset($_GET["name"]))
  $name = $_GET["name"];
if (isset($_GET["surname"]))
  $surname = $_GET["surname"];
if (isset($_GET["date"]))
  $date = $_GET["date"];
if (isset($_GET["email"]))
  $email = $_GET["email"];
if (isset($_GET["username"]))
  $username = $_GET["username"];

?>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="assets/loginstylesheet.css"">
    <meta name=" viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/71d1e0d8c0.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <input type="checkbox" id="flip" <?php echo $register ?>>
    <div class="cover">
      <div class="front">
        <img src="assets/Images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="assets/Images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1" style="z-index: 130;">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
          <form action="src/validate/validate_login.php" method="get">
            <?php if (isset($_GET["redirect"])) echo '<input type="text" name=redirect hidden value="' . $_GET["redirect"] . '" />'; ?>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <input type="checkbox" id="remember_credentials" name="remember_credentials" style="float: left;">
              <label for="remember_credentials" style="float:left; padding-left:10px; margin-top:-5px;">Remember Me</label>
              <div class="button input-box">
                <input type="submit" value="Login">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
              <br>
              <p class="errorText" style="<?php if (isset($error)) echo "display: block; color: red; text-align: center;";
                                          else echo "display: none;" ?>"><?php echo $error; ?></p>
              <br>
            </div>
          </form>
        </div>
        <div class="signup-form">
          <div class="title">Signup</div>
          <form name="register" action="src/validate/validate_register.php" method="GET">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" name="name" id="name" <?php if (isset($name)) echo "value=" . $name; ?> required>
              </div>
              <div class="input-box">
                <i class="fas fa-address-card"></i>
                <input type="text" placeholder="Enter your surname" name="surname" id="surname" <?php if (isset($surname)) echo "value=" . $surname; ?>  required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name="email" id="email" <?php if (isset($email)) echo "value=" . $email; ?> required>
              </div>
              <div class="input-box">
                <i class="fa-regular fa-calendar-check"></i>
                <input type="date" placeholder="Enter your birth date" name="date" id="date" <?php if (isset($date)) echo "value=" . $date; ?> required>
              </div>
              <div class="input-box">
                <i class="fas fa-user-tag"></i>
                <input type="text" placeholder="Enter your username" name="username" id="username" <?php if (isset($username)) echo "value=" . $username; ?> required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" id="password" required>
              </div>
              <div class="input-box">
                <i class="fa-regular fa-circle-check"></i>
                <input type="password" placeholder="Confirm your password" name="confirmPassword" id="confirmPassword" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Create Account">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
              <br>
                            <p class="errorText" style="<?php if (isset($error)) echo "display: block; color: red; text-align: center;";
                                          else echo "display: none;" ?>"><?php echo $error; ?></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>