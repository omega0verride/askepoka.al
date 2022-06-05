<!DOCTYPE html>

<html>

<head>
    <title>Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />
</head>

<body>
    <nav>
        <a href="home.php" class="menus">Home</a>
        <a href="#" id="selectedMenu" class="menus">Account</a>
        <a href="login_register.php" class="menus">Login</a>
        <a href="login_register.php?register" class="menus">Register</a>
        <a href="logout.php" class="menus">Log Out</a>
    </nav>


    <?php
    require("src/auth.php");
    if (checkAuth()) {
        include("src/database.php");

        $username = $_SESSION["username"];
        $sql = 'SELECT role, name, surname, birthday, email, username  FROM users WHERE username = ?';

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($username));
            $row = $stmt->fetch();
            if ($row == null) {
                echo "User not found!";
                $_SESSION["error"] = "User not found!";
                header('Location:login_register.php');
                die();
            }
            $role=$row["role"];
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
            header('Location:update.php?name=' . $name . '&surname=' . $surname . '&date=' . $date . '&email=' . $email . '&username=' . $username);
        }
    } else {
        include("templates/loginPrompt.php");
        loginPrompt();
    }

    ?>


</body>

</html>