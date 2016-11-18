<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About EZSkins</title>
    <link rel="stylesheet" href="../php/css/bulma.css">
    <link rel="stylesheet" href="css/about.css">
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
        <a id="navitemcolor3" class="nav-item is-noactive" href="about.php">
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
        <div class="content">
            <br>
            <div class="animate-bottom">
                <h1>About us</h1>
                <hr>
                <h3 style="color: #EE424B;">Project</h3>
                <p>This project was made as a school project, so it's not an actual working webshop.
                    You can't really buy cheap CS:GO skins on this website. Don't take this website seriously!<br></p>
                <h3 style="color: #EE424B;">Creators</h3>
                <p>-Thomas Zwarts<br>
                    -Barry Willems<br>
                    <br><strong style="color: white">Here is some random text to fill this page! :-) Enjoy!</strong><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius mollis fermentum.
                    Vestibulum varius id ex non faucibus. Mauris tristique nunc eu lacus mollis lacinia. Etiam dignissim, nibh ut iaculis
                    ullamcorper, felis quam rhoncus felis, nec suscipit mauris arcu a quam. Maecenas pellentesque
                    scelerisque purus, rutrum sodales leo finibus sit amet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius mollis fermentum.
                    Vestibulum varius id ex non faucibus. Mauris tristique nunc eu lacus mollis lacinia. Etiam dignissim, nibh ut iaculis
                    ullamcorper, felis quam rhoncus felis, nec suscipit mauris arcu a quam. Maecenas pellentesque
                    scelerisque purus, rutrum sodales leo finibus sit amet.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius mollis fermentum.
                    Vestibulum varius id ex non faucibus. Mauris tristique nunc eu lacus mollis lacinia. Etiam dignissim, nibh ut iaculis
                    ullamcorper, felis quam rhoncus felis, nec suscipit mauris arcu a quam. Maecenas pellentesque
                    scelerisque purus, rutrum sodales leo finibus sit amet.

                    <br><br><br><br>
                </p>

            </div>
            <div class="animate-bottom">
                <div class="tile is-ancestor">
                    <div id="mediaquery1154px" class="tile is-parent" style="align-self:center;margin:0 !important;">
                        <article class="tile is-child notification is-info" style="text-align: center;">
                            <p class="title" style="color: #EE424B;">Thomas Zwarts</p>
                            <p class="subtitle"><i>Developer</i></p>
                            <figure id="imgabout" class="image is-4by3">
                                <img src="../img/thomas.jpg" class="img1"
                                     style="max-width: 320px;max-height: 240px;margin: auto;">
                            </figure>
                        </article>
                    </div>
                    <div id="mediaquery1154px" class="tile is-parent" style="">
                        <article class="tile is-child notification is-info" style="text-align: center">
                            <p class="title" style="color: #EE424B;">Barry Willems</p>
                            <p class="subtitle"><i>Developer</i></p>
                            <figure id="imgabout" class="image is-4by3">
                                <img src="../img/barry.jpg" class="img2"
                                     style="max-width: 320px;max-height: 240px; margin:auto;">
                            </figure>
                        </article>
                    </div>
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
    </div>
</div>
</body>
</html>