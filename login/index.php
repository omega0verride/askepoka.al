<?php
require("../src/config.php");
session_start();

if (isset($_GET['register']))
    $register = "checked";
//log out if wanting to register
else {
    $register = "";
}

require(ROOT_DIR."/src/auth.php");
if (checkAuth() && $register == "") {
    header('Location:'.ROOT_URL.'/account');
    exit();
}



$loginError = null;
if (isset($_SESSION["loginError"])) {
    $loginError = $_SESSION["loginError"];
}
unset($_SESSION["loginError"]);

$registerError = null;
if (isset($_SESSION["registerError"])) {
    $registerError = $_SESSION["registerError"];
}
unset($_SESSION["registerError"]);

if (isset($_COOKIE["register"])) {
    $formData = unserialize($_COOKIE["register"]);
    $name = $formData["name"];
    $surname = $formData["surname"];
    $date = $formData["date"];
    $email = $formData["email"];
    $username = $formData["username"];
}

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
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name=" viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/71d1e0d8c0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login_stylesheet.css">
    <script src="passwordVisible.js"></script>
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip" <?php echo $register ?>>
        <div class="cover">
            <div class="front">
                <img src="<?php echo ROOT_URL?>/assets/images/frontImg.jpg" alt="">
                <div class="text">
                    <span class="text-1">Every new friend is a <br> new adventure</span>
                    <span class="text-2">Let's get connected</span>
                </div>
            </div>
            <div class="back">
                <img class="backImg" src="<?php echo ROOT_URL?>/assets/images/backImg.jpg" alt="">
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
                    <form action="<?php echo ROOT_URL?>/src/validate/validate_login.php" method="get">
                        <?php if (isset($_GET["redirect"])) echo '<input type="text" name=redirect hidden value="' . $_GET["redirect"] . '" />'; ?>
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="username" placeholder="Enter your username" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" id="myPassword" placeholder="Enter your password" required>
                            </div>
                            <div class="showPass">
                                <label class="custom-checkbox">
                                    <input type="checkbox" onclick="myFunction()" />
                                    <i class=" fa-solid fa-eye unchecked"></i>
                                    <i class="fa-regular fa-eye checked"></i>
                                    <a id="passWrite">Show Password</a>
                                </label>
                            </div> <br>
                            <label class="custom-checkbox">
                                <input type="checkbox" id="remember_credentials" name="remember_credentials" style="float: left;" onclick="updateRemember()">
                                <i class="fa-regular fa-bookmark unchecked"></i>
                                <i class="fa-solid fa-bookmark checked"></i>
                                <a id="rememberWrite">Remeber Me</a>
                                <script>
                                    function updateRemember() {
                                        const cb = document.querySelector('#remember_credentials');
                                        if (!cb.checked) {
                                            console.log("TEST");
                                            document.getElementById("rememberWrite").innerHTML = "Remeber Me";
                                        } else {
                                            document.getElementById("rememberWrite").innerHTML = "Forget Me";
                                        }
                                    }
                                </script>
                            </label>
                            <div class="button input-box">
                                <input type="submit" value="Login">
                            </div>
                            <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
                            <br>
                            <p class="errorText" id="errorLogin" style="<?php if (isset($loginError)) echo "display: block; color: red; text-align: center;";
                                                                        else echo "display: none;" ?>"><?php echo $loginError; ?></p>
                            <br>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    <div class="title">Signup</div>
                    <form name="register" action="<?php echo ROOT_URL?>/src/validate/validate_register.php" method="GET">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Enter your name" name="name" id="name" <?php if (isset($name)) echo "value=" . $name; ?> required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-address-card"></i>
                                <input type="text" placeholder="Enter your surname" name="surname" id="surname" <?php if (isset($surname)) echo "value=" . $surname; ?> required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="Enter your email" name="email" id="email" <?php if (isset($email)) echo "value=" . $email; ?> required>
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
                            <div class="showPass">
                                <label class="custom-checkbox">
                                    <input type="checkbox" onclick="signUpPass()" />
                                    <i class=" fa-solid fa-eye unchecked"></i>
                                    <i class="fa-regular fa-eye checked"></i>
                                    <a id="passWriteSignUp">Show Password</a>
                                </label>
                            </div> <br>
                            <div class="button input-box">
                                <input type="submit" value="Create Account">
                            </div>
                            <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                            <br>
                            <p class="errorText" id="erroRegister" style="<?php if (isset($registerError)) echo "display: block; color: red; text-align: center;";
                                                                            else echo "display: none;" ?>"><?php echo $registerError; ?></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>