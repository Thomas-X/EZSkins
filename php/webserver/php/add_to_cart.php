<?php
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_GET['id'])) {

    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");
    $enteredid = $_GET['id'];

    $getvalidid = mysqli_query($connect, "SELECT * FROM skins2 WHERE id='$enteredid'");
    $countvalididrows = mysqli_num_rows($getvalidid);

    //push the current ID to the cart array, if the ID is valid
    if ($countvalididrows != 0) {


        array_push($_SESSION['cart'], $_GET['id']);

        //so we don't get null items when you go to your cart directly without adding 'items'
        array_filter($_SESSION['cart']);

    } else {
        echo "<script type='text/javascript'>alert('STOP MESSING WITH THE URL!! :D');</script>";
    }
}

if (isset($_GET['remove'])) {

    //for the cheeky buggers that like messing with the URL
    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");
    $enteremove = $_GET['remove'];
    $getvalidremove = mysqli_query($connect, "SELECT * FROM skins2 WHERE id='$enteremove'");
    $countvalidremoverows = mysqli_num_rows($getvalidremove);


    if ($countvalidremoverows != 0) {
        array_unique($_SESSION['cart']);
        array_values($_SESSION['cart']);
        $arraykeys = array_keys($_SESSION['cart'], $_GET['remove']);
        $countkeys = count($arraykeys);

        $counter2 = 0;

        foreach ($arraykeys as $counter2) {
            unset($_SESSION['cart'][$counter2]);
            $counter2++;
        }
    } else {
        echo "<script type='text/javascript'>alert('STOP MESSING WITH THE URL!! :D');</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <title>Current shopping cart</title>
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="sideNav/index.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="stylesheet" href="searchcssxphp.php">
    <link rel="stylesheet" href="add_to_cart.css">
    <link rel="stylesheet" href="add_to_cartCSSxPHP.php">

    <script src="js/toggleNav.js"></script>
    <script src="js/loadFunc.js"></script>
    <script src="js/button1.js"></script>
    <script src="js/removeButton.js"></script>
    <script src="js/gotoCart.js"></script>
    <!--    <script src="js/addamounttoCart.js"></script>-->
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
        <a id="navitemcolor3" class="nav-item is-noactive" href="../about/about.php">
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
<div class="cartContainer">
    <p id="title">Your Shoppingcart<?php if (isset($_SESSION['username'])) {
            $var1 = $_SESSION['username'];
            echo ", $var1.";
        } else {
            echo ".";
        } ?></p>
    <hr>
    <?php


    $countarray = array_count_values($_SESSION['cart']);

    $arraykeys2 = array_keys($countarray);



    $arrayunique = array_unique($_SESSION['cart']);
    array_values($arrayunique);
    $arrayfinal = $arrayunique; //im lazy..
    //adding remove buttons
    $counter = 0;
    $buttonstoadd = count($_SESSION['cart']);

    $sum = 0;

    echo "<div class='shopcartColumn'>
<div class='flexleft'>
    <span class='span1'>Name</span>
    </div>
    <div class='flexright'>
        <span class='span2'>Amount</span>
    <span class='span3'>Price</span>
</div>
</div>";


    foreach ($arrayfinal as $counter) {

        $enterednum = $countarray[$counter];


        //connect to db
        $connect = mysqli_connect("localhost", "root", "admin", "ezskins");

        //query stuff for img
        $getidimg2 = mysqli_query($connect, "SELECT icon_url FROM skins WHERE id='$counter'");
        $getidimgarray = mysqli_fetch_assoc($getidimg2);
        $getidimg = $getidimgarray['icon_url'];

        //query stuff for name
        $gettext2 = mysqli_query($connect, "SELECT marketname FROM skins WHERE id='$counter'");
        $gettextarray = mysqli_fetch_assoc($gettext2);
        $gettext = $gettextarray['marketname'];

        //query stuff for price
        $getprice2 = mysqli_query($connect, "SELECT price FROM skins WHERE id='$counter'");
        $getpricearray = mysqli_fetch_assoc($getprice2);
        $getprice = $getpricearray['price'];


        //echo container
        echo "
    <div class=\"Shopitem\">";


        //echo left flex
        echo "<div id='flexleft' class=\"flex-left\" style='width:49%;'>";
        if ($getidimg) {
            echo "<img id=\"imgshopitem\" src=\"$getidimg\">";
        } else {
            echo "<img id=\"imgshopitem\" src=\"https://placekitten.com/300/200\">";
        }
        //echo name of item
        if ($gettext) {
            echo "<span style='padding-left:20px;align-self: center;'>$gettext</span>";
        } else {
            echo "Item not found!!";
        }
        //close left flex
        echo "</div>";
        //right side

        echo "<div id='flexright' class=\"flex-right\" style='width:49%'>";


        $sum += $enterednum * $getprice;

        if ($getprice) {
            echo "<span style='align-self: center;text-align: center'>Amount: $enterednum </span>";
        }



        if ($getprice) {
            echo "<span style='padding:30px;align-self:center;'>$$getprice</span>";
        } else {
            echo "Price not found!!";
        }
        //echo delete button
        echo "<form method='get' style='width: 45px;align-self:center;'><button id='$counter' class='button is-danger' type='submit' name='remove' value='$counter' onclick='removeButton(this.id)'>X</button></form>
    </div>";
        echo "</div>";
        $counter++;
    }
    echo "<div style=\"margin-top:5px;width:100%;display:flex;background-color:#F2F1EF;border-radius:3px;padding:5px;\"><span id='spantotal'>Total:</span><span id='spantotal2' style='align-self: flex-end'>  $$sum</span> </div>"
    ?>


</div>

</body>
</html>
