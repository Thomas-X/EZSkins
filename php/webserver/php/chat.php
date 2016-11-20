<?php
session_start();
/**
 * Created by IntelliJ IDEA.
 * User: Thomas
 * Date: 11/18/2016
 * Time: 8:34 PM
 */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CHAT</title>
    <link rel="stylesheet" href="chat.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="nav/nav.css">
    <link rel="stylesheet" href="nav/navphpXcss.php">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bulma.css">

    <script src="js/toggleNav.js"></script>
    <script src="js/loadFunc.js"></script>
    <script src="js/button1.js"></script>
    <script src="js/removeButton.js"></script>
</head>
<body style="margin-top:75px;">

<nav class="nav" style="position:fixed;width:100%;top:0px;">
    <div id="navcolor" class="nav-left">
        <a class="nav-item is-brand" href="../../index.php">
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
        } else {
            echo "<a href='../index.php' id=\"navitemcolor6\" class='nav-item is-noactive'>
    </a>";
        }
        ?>
        <a id="navitemcolor1" class="nav-item is-noactive" href="search2.php">
            Shop
        </a>
        <a id="navitemcolor2" class="nav-item is-noactive" href="../news/news.php">
            News
        </a>
        <a id="navitemcolor3" class="nav-item is-noactive" href="../about/about.php">
            About
        </a>
        <a id="navitemcolor4" class="nav-item is-noactive" href="../faq/faq.php">
            FAQ
        </a>
        <a id="navitemcolor5" class="nav-item is-noactive" href="../contact/contact.php">
            Contact
        </a>


        <script>
            function gotoCart() {
                window.location = "add_to_cart.php";
            }
        </script>
        <?php
        echo "<i id='shoppingCart' onclick='gotoCart()' class=\"fa fa-shopping-cart nav-item\" aria-hidden=\"true\"></i>"


        ?>


    </div>
</nav>
<div id="redline" style="position:fixed;width:100%;z-index: 2;"> <!-- rood balkje onder nav -->
</div>
<div class="wrapper">
    <?php

    if (isset($_SESSION['username'])) {
        echo '<span style="font-size: 25px;color: #fffbeb;padding-top:20px;padding-bottom:20px;">Chat with fellow <i>NOT</i> scammed people! :)</span>
    <hr>
    <form action="chat.php" method="post"><input class="input" name="userinput" placeholder="Chat here..">
        <button class="button" name="submit">Send</button>
    </form>';
    }
    else {
        echo '<span style="color: #fffbeb;font-size: 2vh;">You are not logged in, you need to be logged in to chat.</span>';
    }
    ?>
    <?php

    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");
    @$userinput = mysqli_real_escape_string($connect, $_POST['userinput']);


    if ($userinput) {
        $gettimestamp = date("l jS F Y h:i:s A");
        $getuser = $_SESSION['username'];
        $userinputfinal = "$gettimestamp | $getuser: $userinput";
        $query = mysqli_query($connect, "INSERT INTO chat(user,time,chat) VALUES ('$getuser','$gettimestamp','$userinputfinal')");

    }
    $counter = 0;

    echo "<div class=\"textbox\">";
    while ($counter != 20) {
        $query2 = mysqli_query($connect, "SELECT chat from chat ORDER BY chat DESC LIMIT 20 OFFSET $counter");
        $historyarray = mysqli_fetch_assoc($query2);
        $historychat = $historyarray['chat'];
        $finalhistory = htmlspecialchars($historychat);
        $history = $finalhistory;
        echo "<br>$history<br>";
        $counter++;
    }
    echo "</div>";

    ?>
</div>
<hr style="width:65%;margin:auto;">

<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">

            <p>
                <strong>EZSkins</strong><a style="color: white;" id="footertekst"> by Thomas Zwarts & Barry
                    Willems. </a>
            </p>
            <p>
                <a class="icon" id="iconbot" href="search2.php">
                    <i class="fa fa-shopping-basket"></i></a>
                <a class="icon" id="iconbot" href="../news/news.php">
                    <i class="fa fa-newspaper-o"></i></a>
                <a class="icon" id="iconbot" href="../about/about.php">
                    <i class="fa fa-question-circle"></i></a>
                <a class="icon" id="iconbot" href="../faq/faq.php">
                    <i class="fa fa-comment"></i></a>
                <a class="icon" id="iconbot" href="../contact/contact.php">
                    <i class="fa fa-address-card-o"></i></a>
            </p>
        </div>
    </div>
</footer>

</body>
</html>