<!DOCTYPE html>
<html>

<head>
    <title>Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
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
    $title = $_GET["title"];
    $name = $_GET["name"];
    $surname = $_GET["surname"];
    $date = $_GET["date"];
    $email = $_GET["email"];
    $username = $_GET["username"];
    ?>
    <div class="centered">
        <div class="container">
            <form name="update" action="validate_update.php" method="GET" autocomplete="off">
                <h1 style="text-align: center;">Update Values</h1>
                <div>
                    <label for="title" style="width: auto;">Title:</label>
                    <select name="title">
                        <option value="Title 1" <?php if($title=="Title 1") echo "selected";?> >Title 1</option>
                        <option value="Title 2" <?php if($title=="Title 2") echo "selected";?> >Title 2</option>
                        <option value="Title 3" <?php if($title=="Title 3") echo "selected";?> >Title 3</option>
                        <option value="Title 4" <?php if($title=="Title 4") echo "selected";?> >Title 4</option>
                    </select>
                </div>

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