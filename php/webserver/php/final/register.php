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
    <link rel="stylesheet" href="nav/nav.css">
    <link rel="stylesheet" href="nav/navphpXcss.php">
    <link rel="stylesheet" href="final/css/font-awesome.css">
    <link rel="stylesheet" href="final/css/bulma.css">

    <script src="js/toggleNav.js"></script>
    <script src="js/loadFunc.js"></script>
    <script src="js/button1.js"></script>
    <script src="js/removeButton.js"></script>
    <script src="js/gotoCart.js"></script>
</head>
<body style="margin-top:75px;">
<nav class="nav" style="position:fixed;width:100%;top:0px;">
    <div id="navcolor" class="nav-left">
        <a class="nav-item is-brand" href="../../index.html">
            <img id="logoezskins" src="logo/logo.png" alt="EZSkins logo">
        </a>
    </div>

    <div id="navcolor" class="nav-center">
        <a class="nav-item" href="https://github.com/Thomas-X/EZSkins" target="_blank">
      <span class="icon">
        <i id="githubicon" class="fa fa-github fa-inverse"></i>
      </span>
        </a>
    </div>

    <span id="nav-toggle" class="nav-toggle" onclick="togglefunction()">
        <span id="spans"></span>
        <span id="spans"></span>
        <span id="spans"></span>
    </span>


    <div id="nav-menu" class="nav-right nav-menu" style="background-color:#222329;padding:0;">
        <?php
        if (isset($_SESSION['username'])) {

            $getusername = $_SESSION['username'];

            echo "<a href='logout.php' id=\"navitemcolor6\" class='nav-item is-noactive'>
    </a>";
        }
        else {
            echo "<a href='login.php?lastpage=search.php' id=\"navitemcolor6\" class='nav-item is-noactive'>
    </a>";
        }
        ?>
        <a id="navitemcolor1" class="nav-item is-noactive" href="../webshop/webshop.html">
            Shop
        </a>
        <a id="navitemcolor2" class="nav-item is-noactive" href="../news/news.html">
            News
        </a>
        <a id="navitemcolor3" class="nav-item is-noactive" href="../about/about.html">
            About
        </a>
        <a id="navitemcolor4" class="nav-item is-noactive" href="faq.html">
            FAQ
        </a>
        <a id="navitemcolor5" class="nav-item is-noactive" href="../contact/contact.html">
            Contact
        </a>
        <?php



        echo "<i id='shoppingCart' onclick='gotoCart()' class=\"fa fa-shopping-cart nav-item\" aria-hidden=\"true\"></i>"


        ?>


    </div>
</nav>
<div id="redline" style="position:fixed;width:100%;z-index: 2;"> <!-- rood balkje onder nav -->
</div>
<div class='flexcontainer'>
<div class="register-frame">
    <div class="register-frame-top">
        <span>Register or <a href="login.php">Login</a></span>
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
</div>

</body>
</html>