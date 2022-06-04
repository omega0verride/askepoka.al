<?php 
    $title = $_GET["title"];
    $name = $_GET["name"];
    $surname = $_GET["surname"];
    $date = $_GET["date"];
    $email = $_GET["email"];
    $username = $_GET["username"];

    if($username == null || $username == "") {
        echo "Username cannot be empty!";
    } else if($name == null || $name == "") {
        echo "Name cannot be empty!";
    } else if($surname == null || $surname == "") {
        echo "Surname cannot be empty!";
    } else if($email == null || $email == "" || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
        echo "Email is invalid!";
    }
	else {
        header('Location:account.php?title='.$title.'&name='.$name.'&surname='.$surname.'&date='.$date.'&email='.$email.'&username='.$username);
    }

?>