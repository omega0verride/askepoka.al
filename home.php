<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />
    <script src="https://kit.fontawesome.com/71d1e0d8c0.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div style="float: left; margin-top:15px; margin-left: 25px;">
            <a href="#" id="selectedMenu" class="menus">Home</a>
            <a href="login_register.php" class="menus">Login</a>
            <a href="login_register.php?register" class="menus">Register</a>
        </div>
        <div class="box">
            <form name="search">
                <input type="text" class="input" name="txt" onmouseout="document.search.txt.value = ''">
            </form>
            <i class="fas fa-search"></i>
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