<?php
require("../src/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/71d1e0d8c0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/askepoka.al/assets/stylesheet.css" />
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
                    <form name="search">
                        <span class="fa fa-lg fa-search" style="margin-right: -35px;"></span>
                        <input type="text" class="search-input-default" name="search" id="search" spellcheck="false" oninput="searchMouseOut()" onmouseover="searchMouseOver()" onmouseout="searchMouseOut()">
                    </form>
                </div>

            </button>


            <button class="menu-item dropdown" style="float: right;" onclick="location.href='#'">
                <div class="fa fa-2x fa-user menu-item-div" style="margin-top: 3px; padding-right: 20px; padding-left: 20px;">
                    <div class="dropdown-content">
                        <a href="#">Account</a>
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
    if (checkAuth()) {
        require(ROOT_DIR . "/src/database.php");

        if (isset($_GET["username"]) &&  $_GET["username"] !== null) {
            $username = $_GET["username"];
        } else {
            $username = $_SESSION["username"];
        }

        if ($username===$_SESSION["username"]){
            $sql = 'SELECT role, name, surname, birthday, email, username  FROM users WHERE username =  ?';

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute(array($username));
                $row = $stmt->fetch();
                if ($row == null) {
                    echo "User not found!";
                    $_SESSION["error"] = "User not found!";
                    die();
                }
                $role = $row["role"];
                $name = $row["name"];
                $surname = $row["surname"];
                $date = $row["birthday"];
                $email = $row["email"];
                $username = $row["username"];
            } catch (Exception $e) {
                echo $e;
            };
    
    
    
            echo '    <div class="centered">
                            <div class="container">
                    <label>Username: ' . $username . '</label></br>
                    <label>Name: ' . $name . '</label></br>
                    <label>Surname: ' . $surname . '</label></br>
                    <label>Email: ' . $email . '</label></br>
                    <label>Birthday: ' . $date . '</label></br>
                    <label>Role: ' . $role . '</label>
                    <br>
                    <br>
                    <form method="post">
                        <input type="submit" name="updateBtn" id="updateBtn" class="customButton" value="Update Values" />
                    </form>
                    </div>
                    </div>
                    ';
            if (isset($_POST['updateBtn'])) {
                header('Location:' . ROOT_URL . '/update.php?name=' . $name . '&surname=' . $surname . '&date=' . $date . '&email=' . $email . '&username=' . $username);
            }
        }
        else{
            $sql = 'SELECT name, surname, email, username FROM users WHERE username =  ?';

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute(array($username));
                $row = $stmt->fetch();
                if ($row == null) {
                    echo "<p style=\"text-align: center\">User not found!</p>";
                    $_SESSION["error"] = "User not found!";
                    die();
                }
                $name = $row["name"];
                $surname = $row["surname"];
                $email = $row["email"];
                $username = $row["username"];
            } catch (Exception $e) {
                echo $e;
            };
    
    
    
            echo '    <div class="centered">
                            <div class="container">
                    <label>Username: ' . $username . '</label></br>
                    <label>Name: ' . $name . '</label></br>
                    <label>Surname: ' . $surname . '</label></br>
                    <label>Email: ' . $email . '</label></br>
                    ';
        }

    } else {
        include(ROOT_DIR . "/templates/loginPrompt.php");
        loginPrompt(ROOT_URL . "/account");
    }

    ?>


</body>

</html>