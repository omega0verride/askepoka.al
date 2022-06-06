<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />
    <script src="https://kit.fontawesome.com/71d1e0d8c0.js" crossorigin="anonymous"></script>
    <!-- <script src="https://kit.fontawesome.com/71d1e0d8c0.js" crossorigin="anonymous"></script> -->
    <style>
        /* Navbar container */

    
        /* The dropdown container */
        .dropdown {
            float: right;
            overflow: hidden;
        }

        /* Dropdown button */
        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            /* Important for vertical align on mobile phones */
            margin: 0;
            /* Important for vertical align on mobile phones */
        }

        /* Add a red background color to navbar links on hover */
        .navbar a:hover,
        .dropdown:hover .dropbtn {
            background-color: red;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            margin-left: -50px;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            float: none;
            color: black;
            /* padding: 12px 16px; */
            text-decoration: none;
            display: block;
            text-align: left;
        }

        /* Add a grey background color to dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        .menu-label {
            /* padding-bottom: 10px; */
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
            font-family: Arial;
            height: 50px;
        }


        /* Links inside the navbar */
        .menu-item,
        .menu-icon {
            border: 1px solid red;
            float: left;
            font-size: 16px;
            color: white;
            height: 100%;
            text-decoration: none;
            overflow: hidden;
            text-align: center;

            align-items: center;
            /* Important for vertical align on mobile phones */
            margin: 0;
        }

        
        .menu-icon-div {
            padding-bottom: 100%;
            margin-bottom: -100%;
            float: left;
        }
        .menu-item-div{
            height: 100%;
            display: b;
            align-items: center;
            vertical-align: middle;
        }

        a {
            font-size: 16px;
            color: white;
            text-align: center;
            text-decoration: none;
            /* display: block; */
            /* align-items: center; */
            /* float: left; */
            /* overflow: hidden; */
            /* vertical-align: middle; */
            /* height: 100%; */
            /* padding-top: 50%; */

        }

        .menu-icon {
            border: none;
            outline: none;
            color: white;
            background-color: inherit;
            font-family: inherit;
            align-items: center;
            overflow: hidden;
            /* Important for vertical align on mobile phones */
            margin: 0;
        }

        .menu-search {
            background-color: inherit;
            font-size: 16px;
            font-family: inherit;
            align-items: center;
            overflow: hidden;
            /* Important for vertical align on mobile phones */
            margin: 0;
        }

        .fa-search {
            color: white;
        }



        .fa-user {
            color: #42a7f5;
        }

        .fa-square-plus {
            color: white;
        }
    </style>
</head>

<body>
    <!-- <nav>
        <div style="float: left; margin-top:15px; margin-left: 25px;">
            <a href="#" id="selectedMenu" class="menus">Home</a>
            <a href="login_register.php" class="menus">Login</a>
            <a href="login_register.php?register" class="menus">Register</a>
        </div>

        <div style="float: right; margin-top:15px; margin-right: 25px;">
            <a href="post.php" class="menus">New Post</a>
            <a href="account.php" class="menus">Account</a>
            <a href="logout.php" class="menus">Log Out</a>
        </div>
    </nav> -->

    <div class="navbar">
        <div class=menu-item><div class="menu-item-div"><a href="#home">Home</a></div></div>
        <div class=menu-item><a href="#news">News</a></div>

        <button class="menu-icon" id="newPost" name="newPost">
            <div class="fa fa-2x fa-square-plus menu-icon-div"></div>
            <div class="menu-icon-div" style="margin-top: 8px; margin-left: 10px;">New Post</div>
        </button>

        <div class="box menu-search">
            <form name="search">
                <input type="text" class="input" name="txt" onmouseout="document.search.txt.value = ''">
            </form>
            <i class="fa fa-search"></i>
        </div>

        <div class="dropdown">

            <button class="menu-icon">
                <div class="fa fa-2x fa-user"></div>
            </button>

            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div>
    </div>

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
                        <div class="fa-solid fa-caret-up" style="color: black; font-size: 30px"></div>
                        <p id="cnt">0</p>
                        <div class="fa-solid fa-caret-down" style="color: black; font-size: 30px"></div>
                    </div>
                </td>
                <td class="card-table card-title">What is Lorem Ipsum? <div class="posted-by-div"><img src="./assets/Images/defaultAvatar.jpg" alt="Avatar" class="avatar"> <p class="posted-by-username">Username</p> <div></td>
            </tr>
            <tr class="card-table">
                <td class="card-table card-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
            </tr>
            <tr class="card-table">
            <td colspan="2" class="card-table card-controls"><p class="posted-date">Date posted: 22/10/2002</p>Comments, report, other options</td>
            </tr>
        </table>
    </div>

    <br>
    <div class="card">
        <table class="card-table">
            <tr class="card-table">
                <td rowspan="2" class="card-table">
                    <div class="votes">
                        <button class="fa-solid fa-arrow-up" style="color: #d6e00b;"></button>
                        <p id="cnt">0</p>
                        <button class="fa-solid fa-arrow-down" style="color: #d6e00b;"></button>
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

    <br>
    <div class="card">
        <table class="card-table">
            <tr class="card-table">
                <td rowspan="2" class="card-table">
                    <div class="votes">
                        <button class="fa-solid fa-arrow-up" style="color: #d6e00b;"></button>
                        <p id="cnt">0</p>
                        <button class="fa-solid fa-arrow-down" style="color: #d6e00b;"></button>
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