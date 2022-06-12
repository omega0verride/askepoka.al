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
    <link rel="stylesheet" type="text/css" href="/askepoka.al/assets/css/posts_stylesheet.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/askepoka.al/assets/js/post_script.js"></script>
    <script src="/askepoka.al/templates/dots_dropdown.js"></script>
    <link rel="stylesheet" href="/askepoka.al/templates/dots_dropdown.css">
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
                    <form name="search" action="/askepoka.al/account">
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
    if (checkAuth()) {
        require(ROOT_DIR . "/src/database.php");

        require(ROOT_DIR . "/src/functions.php");

        if (isset($_GET["username"]) &&  $_GET["username"] !== null) {
            $username = $_GET["username"];
        } else {
            $username = $_SESSION["username"];
        }

        if ($username === $_SESSION["username"]) {
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
                header('Location:update?name=' . $name . '&surname=' . $surname . '&date=' . $date . '&email=' . $email . '&username=' . $username);
            }
        } else {
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
                    <label>Email: ' . $email . '</label></br></div></div>
                    ';
        }



        try {

            if (isset($_GET["search"])) {
                $param = "%" . strtolower($_GET['search']) . "%";
                $sql = 'SELECT `posts`.`postId` as postId, title, content, `posts`.`username` as username, timestampPosted, timestampUpdated, voteId, value, timestampSubmitted
                FROM `posts`
                LEFT OUTER JOIN `votes` ON `votes`.`postId` = `posts`.`postId` AND `votes`.`username`= ? WHERE `posts`.`username` = ? AND (LOWER(title) LIKE ? OR LOWER(content) LIKE ?)
                ORDER BY timestampPosted DESC LIMIT 10';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$username, $username, $param, $param]);
            } else {
                $sql = 'SELECT `posts`.`postId` as postId, title, content, `posts`.`username` as username, timestampPosted, timestampUpdated, voteId, value, timestampSubmitted
                FROM `posts`
                LEFT OUTER JOIN `votes` ON `votes`.`postId` = `posts`.`postId` AND `votes`.`username`= ? WHERE `posts`.`username` = ?
                ORDER BY timestampPosted DESC LIMIT 10';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$username, $username]);
            }
            $results = $stmt->fetchAll();

            $postCNT = 0;

            foreach ($results as $row) {
                $postId = $row["postId"];
                $postTitle = $row["title"];
                $postContent = makeUrltoLink($row["content"]);
                $postUser = $row["username"];
                $timestampPosted = $row["timestampPosted"];
                $postCNT++;

                $sql_votes = 'SELECT SUM(value) as cnt FROM votes WHERE `postId` = ?';
                $stmt_votes = $conn->prepare($sql_votes);
                $stmt_votes->execute([$postId]);
                $results_votes = $stmt_votes->fetch();

                $votesCNT = $results_votes["cnt"];
                if ($votesCNT == null)
                    $votesCNT = 0;


                $userVoteValue = $row["value"];
                if ($userVoteValue == null)
                    $userVoteValue = 0;
                $upBtnClass = "";
                if ($userVoteValue == 1) {
                    $upBtnClass = "vote-btn-checked";
                }
                $downBtnClass = "";
                if ($userVoteValue == -1) {
                    $downBtnClass = "vote-btn-checked";
                }
                $postControlsUser = "";
                if ($postUser === getAuthUsername()) {
                    $postControlsUser = '<div onclick="confirmDelete(' . $postId . ', \'' . ROOT_URL . '/account' . '\')"> Delete </div>';
                }
                echo '
                <div class="card" id="post_' . $postId . '">
                    <table class="card-table">
                        <tr class="card-table">
                            <td rowspan="3" colspan="1" class="card-table card-votes">
                                <div class="votes">
                                    <div id="upBtn_' . $postId . '" class="fa-solid fa-caret-up vote-btn-unchecked ' . $upBtnClass . '" onclick="upVote(' . $postId . ')"></div>
                                    <p class="post-cnt" id="post_' . $postId . '_cnt">' . $votesCNT . '</p>
                                    <div id="downBtn_' . $postId . '" class="fa-solid fa-caret-down vote-btn-unchecked ' . $downBtnClass . '" onclick="downVote(' . $postId . ')"></div>
                                </div>
                            </td>
                            <td class="card-table card-title">
                                ' . $postTitle . '
                            </td>
                            <td  nowrap>
                                <button onclick="location.href=\'/askepoka.al/account?username=' . $postUser . '\'" class="card-button">
                                <div class="posted-by-div"><img src="/askepoka.al/assets/images/defaultAvatar.jpg" alt="Avatar" class="avatar">
                                    <p class="posted-by-username">' . $postUser . '</p>
                                </div>
                                </button>
                            </td>
                        </tr>
                        <tr class="card-table">
                            <td colspan="3" class="card-table card-content">' . $postContent . '</td>
                        </tr>
                        <tr class="card-table">
                            <td colspan="1" class="card-table card-date">
                                <p class="posted-date">Date posted: ' . $timestampPosted . '</p>
                            </td colspan="1" class="card-table card-controls">
                            <td nowrap class="card-table card-controls">
                                <div class="card-comment-btn">Comments</div>

                                <div class="dots_dropdown card-settings">
                                    <!-- three dots -->
                                    <ul class="dropbtn icons" onclick="showDotsDropdown(' . $postId . ')">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <!-- menu -->
                                    <div id="card_menu_dropdown_' . $postId . '" class="dots_dropdown-content">
                                        <a href="#">Save</a>
                                        ' . $postControlsUser . '
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>';
            }
        } catch (Exception $e) {
            echo $e;
        };
    } else {
        include(ROOT_DIR . "/templates/loginPrompt.php");
        loginPrompt(ROOT_URL . "/account");
    }

    ?>


</body>

</html>