<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News about EZSkins</title>

    <link rel="stylesheet" href="../php/css/bulma.css">
    <link rel="stylesheet" href="css/news.css">
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
        <a class="nav-item is-brand" href="../index.php">
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
        } else {
            echo "<a href='../php/logout.php' id=\"navitemcolor6\" class='nav-item is-noactive'>
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
        <a id="navitemcolor5" class="nav-item is-noactive" href="../contact/contact.php">
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
        <h1>News about EZSkins</h1>
        <hr>
        <p>
        <h3 style="color: #EE424B;">Paragraph #1</h3>
        <strong>If this were an actual site this is where news and stuff would go.</strong>
        <a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ligula libero, pharetra in euismod non,
        elementum eu orci. Phasellus sollicitudin tortor in eleifend interdum. Sed at augue elit. Phasellus varius
        nisl hendrerit velit auctor, vel imperdiet arcu fringilla. Phasellus sodales accumsan elit vel vehicula. Sed
        diam nisi, iaculis non consequat at, venenatis at turpis.</a>
        <br><br><br><br>
        <div class="container">
            <img class="img1" src="img/news.jpg"></div>
        <h3 style="color: #EE424B;">Paragraph #2</h3>
        <a >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ligula libero, pharetra in euismod non,
        elementum eu orci. Phasellus sollicitudin tortor in eleifend interdum. Sed at augue elit. Phasellus varius
        nisl hendrerit velit auctor, vel imperdiet arcu fringilla. Phasellus sodales accumsan elit vel vehicula. Sed
        diam nisi, iaculis non consequat at, venenatis at turpis.</a>
        </p>

    </div>

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