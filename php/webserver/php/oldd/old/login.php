<?php

//input from user (via form)
if (isset($_POST['submit'])) {
    session_start();
    //connect variable
    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");

    //user inputs

    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $escapedpassword = mysqli_real_escape_string($connect, $_POST['password']);

    $password = md5($escapedpassword);


    //boolean
    $validentry = false;


    //since we are sure we do not have duplicates in our database, we do not have to worry about accidental extras

//searching for usernames
    $mysql_get_users = mysqli_query($connect, "SELECT * FROM logindata WHERE username='$username' AND password='$password'");
    $get_rows = mysqli_affected_rows($connect);

    //if we found the username the user entered, set usernamevalid to true
    if ($get_rows >= 1) {
        $validentry = true;
    }
    //if we found a password the user entered, set passwordvalid to true

    //only if both usernamevalid AND passwordvalid == true
    if ($validentry === true) {
        $message = "Logging in.."; //logging-y stuff

        $getlastpage = $_GET['lastpage'];
        //setting current user session
        $_SESSION['username'] = $username;
        header("Location: $getlastpage");
        exit();


//TODO MAKE MD5 ENCRYPTION WITH PHP AND MAYBE LOGIN ISN'T NEEDED? CART WITH $_SESSION
        //if the user entered incorrect data, we say bad user!
    } else {

        $message = "Invalid credentials!";
    }
} //standard default message, this only changes when the user clicks on login which is nice
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
<?php
$getuserpage = @$_GET['lastpage'];
echo "<form action=\"login.php?lastpage=$getuserpage\" method=\"post\">
    Username: <input type=\"text\" name=\"username\"><br>
    Password: <input type=\"password\" name=\"password\"><br>
    Login: <input type=\"submit\" name=\"submit\" value=\"Login\">
</form>";



echo $message;
?>
<br><a href="register.php">Not registered yet?</a>
</body>
</html>