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
        if (isset($_GET['lastpage'])) {
            $getlastpage = $_GET['lastpage'];
            //setting current user session
            $_SESSION['username'] = $username;
            header("Location: $getlastpage");
            exit();
        }
//TODO MAKE MD5 ENCRYPTION WITH PHP AND MAYBE LOGIN ISN'T NEEDED? CART WITH $_SESSION
        //if the user entered incorrect data, we say bad user!
    } else {
        $message = "Invalid credentials!";
    }
} //standard default message, this only changes when the user clicks on login which is nice
else {
    $message = "Please log in";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bulma.css">
    <link rel="stylesheet" href="nav/nav.css">
    <link rel="stylesheet" href="nav/navphpXcss.php">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bulma.css">

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

<?php
$getuserpage = @$_GET['lastpage'];
echo "<div class='flexcontainer'><div class=\"login-frame\">
    <div class=\"login-frame-top\">
        <span>Login or <a href=\"register.php\">Register</a></span>
    </div>
    <div class='login-frame-text'>
            <label for='loginorinvalid' style='margin-bottom:2px;color: white;font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", \"Roboto\", \"Oxygen\", \"Ubuntu\", \"Cantarell\", \"Fira Sans\", \"Droid Sans\", \"Helvetica Neue\", \"Helvetica\", \"Arial\", sans-serif;'>$message</label>
    </div>
    <div class=\"login-frame-form\">
        <form action=\"login.php\" method=\"post\">
            <input type=\"text\" placeholder=\"Username\" name=\"username\" id=\"login-width\">
            <input type=\"password\" placeholder=\"Password\" name=\"password\" id=\"login-width1\">
            <input type=\"submit\" name=\"submit\" value=\"Login\" id=\"login-button\">
        </form>
    </div>
</div>
</div>";
?>


</body>
</html>