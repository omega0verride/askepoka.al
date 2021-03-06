<!DOCTYPE html>
<?php
require("../src/config.php");
session_start();
$error = null;
if (isset($_SESSION["postError"])) {
  $error = $_SESSION["postError"];
}
unset($_SESSION["postError"]);

if (isset($_GET["title"]))
  $title = $_GET["title"];
if (isset($_GET["content"]))
  $content = $_GET["content"];

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
  <link rel="stylesheet" type="text/css" href="/askepoka.al/templates/navbar/nav_stylesheet.css" />
  <script src="/askepoka.al/templates/navbar/nav.js"></script>
  <div class="navbar">
    <div class="navbar-container">
      <button class="menu-item" onclick="location.href='/askepoka.al/home'">
        Home
      </button>

      <button class="menu-item menu-search">
        <div class="search-box">
          <form name="search" action="/askepoka.al/home">
            <span class="fa fa-lg fa-search" style="margin-right: -35px;"></span>
            <input type="text" class="search-input-default" name="search" id="search" spellcheck="false" oninput="searchMouseOut()" onmouseover="searchMouseOver()" onmouseout="searchMouseOut()">
          </form>
        </div>

      </button>


      <button class="menu-item dropdown" style="float: right;" onclick="location.href='/askepoka.al/account'">
        <div class="fa fa-2x fa-user menu-item-div" style="margin-top: 3px; padding-right: 20px; padding-left: 20px;">
          <div class="dropdown-content">
            <a href="/askepoka.al/account">Account</a>
            <a href="/askepoka.al/register">Register</a>
            <a href="/askepoka.al/logout">Log Out</a>
          </div>
        </div>
      </button>

      <button class="menu-item" style="float: right;" onclick="location.href='/askepoka.al/post'">
        <div class="fa fa-2x fa-square-plus"></div>
        <div class="menu-item-div" style="margin-top: 8px; margin-left: 10px;">New Post</div>
      </button>
    </div>
  </div>
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
      <form name="post" action="/askepoka.al/src/validate/validate_post.php" method="GET">
        <!-- <h1>New Post</h1> -->
        <div><i>N</i><i>e</i><i>w</i><i> </i><i>P</i><i>o</i><i>s</i><i>t</i></div>

        <br>
        <label for="title" class=".customLabel">Title: </label>
        <input placeholder="Enter a title" type="textarea" maxlength="100" name="title" id="username" class="customInput" <?php if (isset($title)) echo "value=" . $title; ?> required />

        <br>
        <label for="content" class=".customLabel">Content: </label>
        <textarea class="textarea" placeholder="Enter some information..." maxlength="20000" rows="500" cols="50" name="content" id="content" class="customInput" required><?php if (isset($content)) echo $content; ?></textarea>
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
</body>

</html>