<!DOCTYPE html>
<?php
session_start();
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

<html>

<head>
  <title>Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />
  <style>
    .container {
      text-align: left;
    }

    label {
      display: inline-block;
      width: 150px;
    }

    #register {
      width: 100%;
    }
  </style>
</head>

<body>

  <nav>
    <a href="welcome.php" class="menus">Home</a>
    <a href="account.php" class="menus">Account</a>
    <a href="login.php" class="menus">Login</a>
    <a href="#" id="selectedMenu" class="menus">Register</a>
    <a href="logout.php" class="menus">Log Out</a>
  </nav>

  <div class="centered">
    <div class="container">
      <h1 style="text-align: center;">Sign Up</h1>

      <p class="errorText" style="<?php if (isset($error)) echo "display: block; color: red; text-align: center;";
                                  else echo "display: none;" ?>"><?php echo $error; ?></p>

      <form name="register" action="validate_register.php" method="GET" autocomplete="off">

        <div>
          <label for="title" style="width: auto;">Title:</label>
          <select name="title">
            <option value="Title 1" <?php if ($title == "Title 1") echo "selected"; ?>>Title 1</option>
            <option value="Title 2" <?php if ($title == "Title 2") echo "selected"; ?>>Title 2</option>
            <option value="Title 3" <?php if ($title == "Title 3") echo "selected"; ?>>Title 3</option>
            <option value="Title 4" <?php if ($title == "Title 4") echo "selected"; ?>>Title 4</option>
          </select>
        </div>

        <br>
        <label for="name">Name: </label>
        <input type="text" class="customInput" name="name" id="name" <?php if (isset($name)) echo "value=" . $name; ?> />

        <br>
        <label for="surname">Surname: </label>
        <input type="text" class="customInput" name="surname" id="surname" <?php if (isset($surname)) echo "value=" . $surname; ?> />

        <br>
        <label for="date">Date Of Birth: </label>
        <input type="date" class="customInput" name="date" id="date" <?php if (isset($date)) echo "value=" . $date; ?> />

        <br>
        <label for="email">Email: </label>
        <input type="text" class="customInput" name="email" id="email" <?php if (isset($email)) echo "value=" . $email; ?> />

        <br>
        <label for="username">Username: </label>
        <input type="text" class="customInput" name="username" id="username" <?php if (isset($username)) echo "value=" . $username; ?> />

        <br>
        <label for="password">Password: </label>
        <input type="password" class="customInput" name="password" id="password" />

        <br>
        <label for="confirmPassword">Confirm Password: </label>
        <input type="password" class="customInput" name="confirmPassword" id="confirmPassword" />

        <br>
        <input type="submit" value="Register" id="register" class="customButton" />

      </form>

      <p style="text-align: center;">Already registred?
      <form action="login.php" style="text-align: center;">
        <input type="submit" class="customButton" value="Sign In" />
      </form>
      </p>

    </div>
  </div>
</body>

</html>