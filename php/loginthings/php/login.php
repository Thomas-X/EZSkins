<?php

//input from user (via form)
if(isset($_POST['submit'])) {
    session_start();
    //connect variable
    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");

    //user inputs
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    //cleaning user input


    //boolean
    $usernamevalid = false;
    $passwordvalid = false;


    //since we are sure we do not have duplicates in our database, we do not have to worry about accidental extras

//searching for usernames
    $mysql_get_users = mysqli_query($connect, "SELECT * FROM logindata where username='$username'");
    $get_rows = mysqli_affected_rows($connect);
//searching for password
    $mysql_get_passwords = mysqli_query($connect, "SELECT * FROM logindata where password='$password'");
    $get_rows2 = mysqli_affected_rows($connect);

    //if we found the username the user entered, set usernamevalid to true
    if ($get_rows >= 1) {
        $usernamevalid = true;
    }
    //if we found a password the user entered, set passwordvalid to true
    if ($get_rows2 >= 1) {
        $passwordvalid = true;
    }

    //only if both usernamevalid AND passwordvalid == true
    if ($usernamevalid === true && $passwordvalid === true) {
        $message = "Logging in.."; //logging-y stuff

        //setting current user session
        $_SESSION['username']=$username;
        header('Location: session.php');
        exit();

        //if the user entered incorrect data, we say bad user!
    } else {

        $message = "Invalid credentials!";
    }
}
//standard default message, this only changes when the user clicks on login which is nice
else {
    $message = "Please log in.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<form action="login.php" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Login:    <input type="submit" name="submit" value="Login">
</form>


<?php
echo $message;
?>
<br><a href="register.php">Not registered yet?</a>
</body>
</html>