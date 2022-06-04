<!DOCTYPE html>
<html>

<head>
    <title>Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/stylesheet.css" />
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
    <?php
    $name = $_GET["name"];
    $surname = $_GET["surname"];
    $date = $_GET["date"];
    $email = $_GET["email"];
    $username = $_GET["username"];
    ?>
    <div class="centered">
        <div class="container">
            <form name="update" action="src/validate/validate_update.php" method="GET" autocomplete="off">
                <h1 style="text-align: center;">Update Values</h1>


                <br>
                <label for="name">Name: </label>
                <input type="text" class="customInput" name="name" id="name" value=<?php echo $name; ?> />

                <br>
                <label for="surname">Surname: </label>
                <input type="text" class="customInput" name="surname" id="surname" value=<?php echo $surname; ?> />

                <br>
                <label for="date">Date Of Birth: </label>
                <input type="date" class="customInput" name="date" id="date" value=<?php echo $date; ?> />

                <br>
                <label for="email">Email: </label>
                <input type="text" class="customInput" name="email" id="email" value=<?php echo $email; ?> />

                <br>
                <label for="username">Username: </label>
                <input type="text" class="customInput" name="username" id="username" value=<?php echo $username; ?> />

                <br>
                <input type="submit" value="Update" id="update" class="customButton" />

        </div>
    </div>
</body>

</html>