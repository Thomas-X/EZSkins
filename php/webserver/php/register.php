<?php
// is form submitted?
if (isset($_POST['submit'])) {

    //declaring connect variable
    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");

    //declaring variables, for ease of use
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);


    //we loop this query till we find a username in the database rows
    $mysql_get_users = mysqli_query($connect, "SELECT * FROM logindata where username='$username'");
    $get_rows = mysqli_affected_rows($connect);
    if ($get_rows >= 1) {
        $message = "User already exists, try another name";

        // we didn't find a duplicate username? okay then it's not a duplicate, let's do this instead.
    } else {
        $result = mysqli_query($connect, "insert into logindata (username, password) values ('$username','$password')");
        $message = "Registered!";
        mysqli_close($connect);
    }
} //submission failed, something wrong with user input
else {
    $message = "Please register.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>halp</title>
</head>
<body>
<form action="register.php" method="post">
    Username: <input type="text" name="username" value="">
    <br>
    Password: <input type="password" name="password" value="">
    <br>
    Register <input type="submit" name="submit" value="Submit">
</form>

<?php echo $message;
?>
<br><a href="login.php">Already registered?</a>


//TODO MAKE MD5 ENCRYPTION WITH PHP AND MAYBE LOGIN ISN'T NEEDED? CART WITH $_SESSION
</body>
</html>

