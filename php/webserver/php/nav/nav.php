<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="navphpXcss.php">
    <link rel="stylesheet" href="font-awesome.css">
    <link rel="stylesheet" href="bulma.css">


    <script src="../js/toggleNav.js"></script>
    <script src="../js/loadFunc.js"></script>
    <script src="../js/button1.js"></script>
    <script src="../js/removeButton.js"></script>
    <script src="../js/gotoCart.js"></script>
</head>
<body style="margin-top:75px;">
<nav class="nav" style="position:fixed;width:100%;top:0px;">
    <div id="navcolor" class="nav-left">
        <a class="nav-item is-brand" href="../../index.html">
            <img id="logoezskins" src="../logo/logo.png" alt="EZSkins logo">
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

        if (isset($_SESSION['username'])) {

            $getusername = $_SESSION['username'];

            echo "<a href='logout.php' id=\"navitemcolor6\" class='nav-item is-noactive'>
    </a>";
        }
        else {
            echo "<a href='login.php?lastpage=search.php' id=\"navitemcolor6\" class='nav-item is-noactive'>
    </a>";
        }

        echo "<i id='shoppingCart' onclick='gotoCart()' class=\"fa fa-shopping-cart nav-item\" aria-hidden=\"true\"></i>"


        ?>


    </div>
</nav>
<div id="redline" style="position:fixed;width:100%;z-index: 2;"> <!-- rood balkje onder nav -->
</div>
<!-- TEMPLATE FOR NAVBAR!!-->

<img style="display:block;" src="https://placekitten.com/400/200">
<img style="display:block;" src="https://placekitten.com/500/200">
<img style="display:block;" src="https://placekitten.com/600/300">
<img style="display:block;" src="https://placekitten.com/700/300">
<img style="display:block;" src="https://placekitten.com/800/400">
<img style="display:block;" src="https://placekitten.com/900/400">
</body>
</html>