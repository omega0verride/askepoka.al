<?php
require("../src/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/71d1e0d8c0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/askepoka.al/assets/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="posts_stylesheet.css" />
    <script src="script.js"></script>
</head>

<body>

    <link rel="stylesheet" type="text/css" href="/askepoka.al/templates/navbar/nav_stylesheet.css" />
    <script src="/askepoka.al/templates/navbar/nav.js"></script>
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
        loginPrompt(ROOT_URL . '/home');
        // die();
    }
    ?>

    <?php
    require(ROOT_DIR . "/src/database.php");
    $sql = 'SELECT postID, title, content, username, timestampPosted FROM posts ORDER BY timestampPosted DESC LIMIT 10';

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        // if ($row == null) {
        //     echo "No posts!";
        //     $_SESSION["error"] = "No posts found!";
        //     // die();
        // }
        $postCNT = 0;
        foreach ($results as $row) {
            $postID = $row["postID"];
            $postTitle = $row["title"];
            $postContent = $row["content"];
            $postUser = $row["username"];
            $timestampPosted = $row["timestampPosted"];
            $postCNT++;
            echo '
            <div class="card" id="post_'.$postID.'">
            <table class="card-table">
                <tr class="card-table">
                    <td rowspan="3" colspan="1" class="card-table card-votes">
                        <div class="votes">
                            <div class="fa-solid fa-caret-up" style="color: black; font-size: 30px" onclick="upVote(1)"></div>
                            <p class="post-cnt" id="post_1_cnt">0</p>
                            <div class="fa-solid fa-caret-down" style="color: black; font-size: 30px" onclick="downVote(1)"></div>
                        </div>
                    </td>
                    <td class="card-table card-title">
                        '.$postTitle.'
                    </td>
                    <td  nowrap>
                        <button onclick="location.href=\'/askepoka.al/account?username='.$postUser.'\'" class="card-button">
                        <div class="posted-by-div"><img src="/askepoka.al/assets/images/defaultAvatar.jpg" alt="Avatar" class="avatar">
                            <p class="posted-by-username">'.$postUser.'</p>
                        </div>
                        </button>
                    </td>
                </tr>
                <tr class="card-table">
                    <td colspan="3" class="card-table card-content">'.$postContent.'</td>
                </tr>
                <tr class="card-table">
                    <td colspan="1" class="card-table card-date">
                        <p class="posted-date">Date posted: '.$timestampPosted.'</p>
                    </td colspan="1" class="card-table card-controls">
                    <td nowrap class="card-table card-controls">
                        Comments
                    </td>
                </tr>
            </table>
        </div>';
        }
    } catch (Exception $e) {
        echo $e;
    };

    ?>


    <!-- <div class="card" id="post_0">
        <table class="card-table">
            <tr class="card-table">
                <td rowspan="3" colspan="1" class="card-table card-votes">
                    <div class="votes">
                        <div class="fa-solid fa-caret-up" style="color: black; font-size: 30px" onclick="upVote(1)"></div>
                        <p class="post-cnt" id="post_1_cnt">0</p>
                        <div class="fa-solid fa-caret-down" style="color: black; font-size: 30px" onclick="downVote(1)"></div>
                    </div>
                </td>
                <td class="card-table card-title">
                    title123123123
                </td>
                <td  nowrap>
                    <button onclick="location.href='/askepoka.al/account?username=admin1'" class="card-button">
                    <div class="posted-by-div"><img src="/askepoka.al/assets/images/defaultAvatar.jpg" alt="Avatar" class="avatar">
                        <p class="posted-by-username">user1</p>
                    </div>
                    </button>
                </td>
            </tr>
            <tr class="card-table">
                <td colspan="3" class="card-table card-content">asdf</td>
            </tr>
            <tr class="card-table">
                <td colspan="1" class="card-table card-date">
                    <p class="posted-date">Date posted: 22/10/2002</p>
                </td colspan="1" class="card-table card-controls">
                <td nowrap class="card-table card-controls">
                    Comments
                </td>
            </tr>
        </table>
    </div> -->
</body>

</html>