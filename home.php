<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />

    <style>
        .card-table{
            /* border: 1px solid white; */
        }
        .card {
            padding-left: 3%;
            width: 94%;
            text-align: center;
        }

        .card-title {
            text-align: center;
        }

        .card-content {
            text-align: left;
            padding: 5px;
        }

        .card-controls {
            text-align: right;
        }

        .votes {
            float: left;
            border: 1px solid red;
            background-color: red;
            text-align: center;
            width: 100px;
            height: 100%;
        }
    </style>
</head>

<body>
    <nav>
        <div style="float: left; margin-top:15px; margin-left: 25px;">
        <a href="#" id="selectedMenu" class="menus">Home</a>
        <a href="login_register.php" class="menus">Login</a>
        <a href="login_register.php?register" class="menus">Register</a>
        </div>
        <div style="display: inline-block; text-align: center; margin-top:15px; margin-right: 25px;">
            <input type="text" placeholder="Search...">
        </div>
        <div style="float: right; margin-top:15px; margin-right: 25px;">
        <a href="post.php" class="menus">New Post</a>
        <a href="account.php" class="menus">Account</a>
        <a href="logout.php" class="menus">Log Out</a>
        </div>
    </nav>

    <?php
    require("src/auth.php");
    if (checkAuth()) {
        echo "<p><b>Welcome</b></p>";
    } else {
        include("templates/loginPrompt.php");
        loginPrompt();
    }
    ?>

    <div class="card">
        <table class="card-table">
            <tr class="card-table">
                <td rowspan="2" class="card-table">
                    <div class="votes">
                        <button>Up</button>
                        <p id="cnt">0</p>
                        <button>Down</button>
                    </div>
                </td>
                <td class="card-table card-title">What is Lorem Ipsum?</td>
            </tr>
            <tr class="card-table">
                <td class="card-table card-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
            </tr>
            <tr class="card-table">
                <td colspan="2" class="card-table card-controls">Comments, report, other options</td>
            </tr>
        </table>
    </div>
</body>

</html>