<?php
// is form submitted?
if (isset($_POST['submit'])) {

    //declaring connect variable
    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");

    //declaring variables, for ease of use
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $escapedpassword = mysqli_real_escape_string($connect, $_POST['password']);

    $password = md5($escapedpassword);


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
    $message = "Please register";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="bulma.css">
</head>
<body>

<div class="register-frame">
    <div class="register-frame-top">
        <span>Register or <a href="../login/login.php">Login</a></span>
    </div>
    <div class="register-frame-text">
        <?php echo "<span id='message'>$message</span>";
        ?>
    </div>

    <div class="register-frame-form">
        <form action="register.php" method="post">
            <input type="text" name="username" placeholder="Username" id="register-width">
            <input type="password" name="password" placeholder="Password" id="register-width1">
            <input type="submit" name="submit" value="Register" id="register-button">
        </form>
    </div>
</div>

</body>
</html>