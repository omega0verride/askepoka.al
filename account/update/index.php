<!DOCTYPE html>
<?php
require("../../src/config.php");
require(ROOT_DIR . "/src/auth.php");

if (!checkAuth()) {
    include(ROOT_DIR . "/templates/loginPrompt.php");
    loginPrompt(ROOT_URL . "/account/update");
}

$updateError = null;
if (isset($_SESSION["updateError"])) {
    $updateError = $_SESSION["updateError"];
}
unset($_SESSION["updateError"]);

$name = $_GET["name"];
$surname = $_GET["surname"];
$date = $_GET["date"];
$email = $_GET["email"];
$username = $_GET["username"];
?>
<html>

<head>
    <title>Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/askepoka.al/assets/stylesheet.css" />
    <style>
        .container {
            text-align: left;
        }

        label {
            display: inline-block;
            width: 150px;
        }

        #update {
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="centered">
        <div class="container">
            <form name="update" action="/askepoka.al/src/validate/validate_update.php" method="GET" autocomplete="off">
                <h1 style="text-align: center;">Update Values</h1>


                <br>
                <label for="name">Name: </label>
                <input type="text" class="customInput" name="name" id="name" value=<?php echo $name; ?> required />

                <br>
                <label for="surname">Surname: </label>
                <input type="text" class="customInput" name="surname" id="surname" value=<?php echo $surname; ?> required />

                <br>
                <label for="date">Date Of Birth: </label>
                <input type="date" class="customInput" name="date" id="date" value=<?php echo $date; ?> required />

                <br>
                <label for="email">Email: </label>
                <input type="email" class="customInput" name="email" id="email" value=<?php echo $email; ?> required />

                <br>
                <label for="username">Username: </label>
                <input type="text" class="customInput" name="username" id="username" value=<?php echo $username; ?> required />

                <br>
                <input type="submit" value="Update" id="update" class="customButton" />
                <p class="errorText" id="errorUpdate" style="<?php if (isset($updateError)) echo "display: block; color: red; text-align: center;";
                                                            else echo "display: none;" ?>"><?php echo $updateError; ?></p>
                <br>
        </div>
    </div>
</body>

</html>