<!DOCTYPE html>
<?php
require("../src/config.php");
session_start();
$error = null;
if (isset($_SESSION["error"])) {
  $error = $_SESSION["error"];
}
unset($_SESSION["error"]);

?>

<html>

<head>
  <title>Post</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="/askepoka.al/assets/stylesheet.css" />
  <script src="https://kit.fontawesome.com/71d1e0d8c0.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="post_stylesheet.css">
</head>

<body>

  <?php
  require(ROOT_DIR . "/src/auth.php");
  if (!checkAuth()) {
    include(ROOT_DIR . "/templates/loginPrompt.php");
    loginPrompt(ROOT_URL . "/post");
    die();
  }
  ?>

  <div class="centered">
    <div class="container">
      <form name="post" action="/askepoka.al/src/validate/validate_post.php" method="get">
        <!-- <h1>New Post</h1> -->
        <div><i>N</i><i>e</i><i>w</i><i> </i><i>P</i><i>o</i><i>s</i><i>t</i></div>

        <br>
        <label for="title" class=".customLabel">Title: </label>
        <input placeholder="Enter a title" type="textarea" maxlength="2000" name="title" id="username" class="customInput" required />

        <br>
        <label for="content" class=".customLabel">Content: </label>
        <textarea class="textarea" placeholder="Enter some information..." maxlength="10000" rows="500" cols="50" name="content" id="content" class="customInput"></textarea>
        <br>

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
</body>

</html>