<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>

    <link rel="stylesheet" href="../php/css/bulma.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="../php/css/font-awesome.css">
    <link rel="stylesheet" href="../php/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!--    <script src="../php/js/loadFunc.js"></script>-->
    <script src="../php/js/toggleNav.js"></script>
    <script src="../php/js/loadFunc.js"></script>
    <script src="../php/js/button1.js"></script>
    <script src="../php/js/removeButton.js"></script>
    <link rel="stylesheet" href="../php/css/font-awesome.css">
    <script src="../php/js/toggleNav.js"></script>
    <script src="../php/js/loadFunc.js"></script>
    <script src="../php/js/button1.js"></script>
    <link rel="stylesheet" href="../php/sideNav/index.css">
    <link rel="stylesheet" href="../php/css/font-awesome.min.css">
    <link rel="stylesheet" href="../php/css/font-awesome.css">
    <link rel="stylesheet" href="../php/css/bulma.css">
    <!--    <link rel="stylesheet" href="php/css/faq.css">-->
    <link rel="stylesheet" href="../php/searchcssxphp.php">
</head>

<body style="margin-top:75px;">
<nav class="nav" style="position:fixed;width:100%;top:0px;">
    <div id="navcolor" class="nav-left">
        <a class="nav-item is-brand" href="../../index.php">
            <img id="logoezskins" src="../php/logo/logo.png" alt="EZSkins logo">
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

            echo "<a href='../php/logout.php' id=\"navitemcolor6\" class='nav-item is-noactive'>
    </a>";
        }
        else {
            echo "<a href='../php/login.php' id=\"navitemcolor6\" class='nav-item is-noactive'>
    </a>";
        }
        ?>
        <a id="navitemcolor1" class="nav-item is-noactive" href="../php/search2.php">
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
        <a id="navitemcolor5" class="nav-item is-noactive" href="contact.php">
            Contact
        </a>


        <script>
            function gotoCart() {
                window.location = "../php/add_to_cart.php";
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
        <div class="animate-bottom">
            <div class="content">
                <br>
                <h1>Contact</h1>
                <hr>
                <p><strong style="color: white;">Here you can find some random contact info. This isn't our real address ofcourse!</strong>
                    <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius mollis fermentum.
                    Vestibulum
                    varius id
                    ex non faucibus. Mauris tristique nunc eu lacus mollis lacinia. Etiam dignissim, nibh ut iaculis
                    ullamcorper, felis quam rhoncus felis, nec suscipit mauris arcu a quam. Maecenas pellentesque
                    scelerisque
                    purus, rutrum sodales leo finibus sit amet.
                    <br><br>
                    In cursus laoreet ex, quis posuere mauris. Cum sociis natoque penatibus et magnis dis parturient
                    montes,
                    nascetur ridiculus mus. Sed vitae diam mauris. Nunc eget sem bibendum metus pharetra euismod.
                    Interdum et
                    malesuada fames ac ante ipsum primis in faucibus. Donec arcu lectus, placerat vitae laoreet eu,
                    pharetra eu
                    risus. Donec gravida, lacus at imperdiet aliquam, ante risus fringilla purus, at viverra lacus metus
                    quis
                    ex. Suspendisse eget est ac sem scelerisque porta eget accumsan est. Integer porttitor metus et nibh
                    semper
                    interdum. Quisque rutrum, tellus nec accumsan facilisis, orci velit dictum ipsum, nec convallis orci
                    massa
                    sit amet sem. Vivamus tincidunt mauris at enim placerat vehicula.<br><br><br><br>
                </p>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.721940124361!2d80.94289654332144!3d26.848794988088905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd08693c7d07%3A0xaaccaa2e123648f8!2sSartorius+Weighing+India+Pvt.+Ltd.!5e0!3m2!1snl!2snl!4v1478159975251"
                        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <!--FOOTER-->
            <hr>
            <footer class="footer">
                <div class="container">
                    <div class="content has-text-centered">
                        <p>
                            <strong>EZSkins</strong><a style="color: white;" id="footertekst"> by Thomas Zwarts & Barry Willems. </a>
                        </p>
                        <p>
                            <a class="icon" id="iconbot" href="../php/search2.php">
                                <i class="fa fa-shopping-cart"></i></a>
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
        </div>
    </div>
</body>
</html>