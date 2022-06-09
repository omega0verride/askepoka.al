<!DOCTYPE html>
<?php
require("src/config.php")
session_start();
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
  <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />
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

  <?php
  require(ROOT_DIR."/src/auth.php");
  if (checkAuth()) {
    echo '
  <div class="centered">
    <div class="container">
      <form name="post" action="src/validate/validate_post.php" method="get">
        <h1>New Post</h1>

        <br>
        <label for="title" class=".customLabel">Title: </label>
        <input type="textarea" maxlength="128" name="title" id="username" class="customInput" required />

        <br>
        <label for="content" class=".customLabel">Content: </label>
        <textarea maxlength="10000" rows="500" cols="50" name="content" id="content" class="customInput"> </textarea> 
        <br>
        <input type="checkbox" id="remember_credentials" name="remember_credentials" style="float: left;">
        <label for="remember_credentials" style="float:left; padding-left:10px; padding-top:1px;">Remember Me</label>

        <br>
        <br>
        <p class="errorText" style="<?php if (isset($error)) echo "display: inline; color: red;";
                                    else echo "display: none;" ?>"><?php echo $error; ?></p>
        <br>
        <br>
        <input type="submit" value="Post" id="post" class="customButton" />

      </form>
      </p>

    </div>
  </div>
  <div class="centered">
    Testing credentials: Username: admin Password: admin123
  </div>
  ';
  } else {
    include(ROOT_DIR."/templates/loginPrompt.php");
    loginPrompt(ROOT_URL."/post.php");
  }
  ?>
</body>

</html>