<!DOCTYPE html>

<html>

<head>
    <title>Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />
</head>

<body>
    <nav>
        <a href="welcome.php" class="menus">Home</a>
        <a href="#" id="selectedMenu" class="menus">Account</a>
        <a href="login.php" class="menus">Login</a>
        <a href="register.php" class="menus">Register</a>
        <a href="logout.php" class="menus">Log Out</a>
    </nav>

    <div class="centered">
        <div class="container">
            <?php
            session_start();
            if (isset($_COOKIE["username"]) && isset($_COOKIE["hashedPass"])) {
                $_SESSION["username"] = $_COOKIE["username"];
                $_SESSION["hashedPass"] = $_COOKIE["hashedPass"];
            }
            if (!isset($_SESSION["username"]) || !isset($_SESSION["hashedPass"])) {
                echo
                "<strong>Please login first.</strong>
            <br><br>
            <form action=\"login.php\">
                <input type=\"submit\" class=\"customButton\" value=\"Login\" />
            </form>";
            } else {
                include("includes/database.php");

                $username = $_SESSION["username"];
                $sql = 'SELECT title, name, surname, birthday, email, username  FROM users WHERE username="' . $username . '"';

                try {
                    $stmt = $conn->query($sql);
                    $row = $stmt->fetch();
                    if ($row == null) {
                        echo "User not found!";
                        $_SESSION["error"] = "User not found!";
                        header('Location:login.php');
                        die();
                    }
                    $title = $row["title"];
                    $name = $row["name"];
                    $surname = $row["surname"];
                    $date = $row["birthday"];
                    $email = $row["email"];
                    $username = $row["username"];
                } catch (Exception $e) {
                    echo $e;
                };



                echo '
                <label>Username: ' . $username . '</label></br>
                <label>Name: ' . $name . '</label></br>
                <label>Surname: ' . $surname . '</label></br>
                <label>Email: ' . $email . '</label></br>
                <label>Birthday: ' . $date . '</label></br>
                <label>Title: ' . $title . '</label>
                <br>
                <br>
                <form method="post">
                    <input type="submit" name="updateBtn" id="updateBtn" class="customButton" value="Update Values" />
                </form>
                ';
                if (isset($_POST['updateBtn'])) {
                    header('Location:update.php?title=' . $title . '&name=' . $name . '&surname=' . $surname . '&date=' . $date . '&email=' . $email . '&username=' . $username);
                }
            }
            ?>
        </div>
    </div>

</body>

</html>