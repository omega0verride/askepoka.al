<?php
require("../src/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/71d1e0d8c0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL ?>/assets/stylesheet.css" />
</head>

<body>

    <link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL ?>/templates/navbar/nav_stylesheet.css" />
    <script src="<?php echo ROOT_URL ?>/templates/navbar/nav.js"></script>
    <div class="navbar">
        <div class="navbar-container">
            <button class="menu-item" onclick="location.href='#'">
                Home
            </button>

            <button class="menu-item menu-search">
                <div class="search-box">
                    <form name="search">
                        <span class="fa fa-lg fa-search" style="margin-right: -35px;"></span>
                        <input type="text" class="search-input-default" name="search" id="search" spellcheck="false" oninput="searchMouseOut()" onmouseover="searchMouseOver()" onmouseout="searchMouseOut()">
                    </form>
                </div>

            </button>


            <button class="menu-item dropdown" style="float: right;" onclick="location.href='<?php echo ROOT_URL?>/account'">
                <div class="fa fa-2x fa-user menu-item-div" style="margin-top: 3px; padding-right: 20px; padding-left: 20px;">
                    <div class="dropdown-content">
                        <a href="<?php echo ROOT_URL ?>/account">Account</a>
                        <a href="<?php echo ROOT_URL ?>/register">Register</a>
                        <a href="<?php echo ROOT_URL ?>/logout">Log Out</a>
                    </div>
                </div>
            </button>

            <button class="menu-item" style="float: right;" onclick="location.href='<?php echo ROOT_URL ?>/post'">
                <div class="fa fa-2x fa-square-plus"></div>
                <div class="menu-item-div" style="margin-top: 8px; margin-left: 10px;">New Post</div>
            </button>
        </div>
    </div>

    <?php
    require(ROOT_DIR . "/src/auth.php");
    if (checkAuth()) {
        echo "<p><b>Welcome</b></p>";
    } else {
        include(ROOT_DIR . "/templates/loginPrompt.php");
        loginPrompt(ROOT_URL . '/home');
    }
    ?>

    <div class="card">
        <table class="card-table">
            <tr class="card-table">
                <td rowspan="2" class="card-table">
                    <div class="votes">
                        <div class="fa-solid fa-caret-up" style="color: black; font-size: 30px"></div>
                        <p id="cnt">0</p>
                        <div class="fa-solid fa-caret-down" style="color: black; font-size: 30px"></div>
                    </div>
                </td>
                <td class="card-table card-title">What is Lorem Ipsum? <div class="posted-by-div"><img src="<?php echo ROOT_URL?>/assets/images/defaultAvatar.jpg" alt="Avatar" class="avatar">
                        <p class="posted-by-username">Username</p>
                        <div>
                </td>
            </tr>
            <tr class="card-table">
                <td class="card-table card-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
            </tr>
            <tr class="card-table">
                <td colspan="2" class="card-table card-controls">
                    <p class="posted-date">Date posted: 22/10/2002</p>Comments, report, other options
                </td>
            </tr>
        </table>
    </div>
</body>

</html>