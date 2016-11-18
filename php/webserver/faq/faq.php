<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQ</title>


    <link rel="stylesheet" href="../php/css/bulma.css">
    <link rel="stylesheet" href="css/faq.css">
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
        <h1>Frequently Asked Questions</h1>
        <hr>
        <h3 style="color: #EE424B;">What is EZSkins?</h3>
        <p>EZSkins is the premier buying website for buying your cheap CS:GO skins.</p>

        <h3 style="color: #EE424B;">Is this a scam site?</h3>
        <p>No it isn't ofcourse ;)</p>

        <h3 style="color: #EE424B;">How do I get free money?</h3>
        <p>There are multiple ways to get free coins:<br>
        <ul>
            <li>Redeeming an affiliate code ($0.50: You get $0.50 instantly when you use a referral code)</li>
            <li>Referring users (1% + $0.05: You get 1% of referred user's bets and $0.05 for redeeming your code)</li>
            <li>Daily Faucet (Upto $2.5 every 24 hours: You can get free money by leveling your account, read more below
                on
                levels)
            </li>
            <li>Daily name reward ($0.10): You get $0.10 daily for having EZSkins in your Steam name</li>
            <li>Group reward ($0.25): You get $0.25 once for joining the EZSkins Steam group</li>
        </ul>
        </p><br>

        <h4 style="color: #EE424B;">How much are coins worth?</h4>
        <p>1 coin = $1 (Note: Coins are virtual currency and have no real-life value)</p>

        <h3 style="color: #EE424B;">What is Faucet?</h3>
        <p>Faucet rewards players with free coins every 24 hours based on their level. Levels are gained by reaching a
            certain threshold of experience for each respective level. You can gain experience by wagering coins in Dice
            or
            Roulette mode</p>

        <h3 style="color: #EE424B;">Fees</h3>
        <p>EZSkins takes no fees for bets placed in Roulette, Crash, Match betting & Dice mode, for Coinflip there's a
            small fee of 2.5% per side.</p>

        <h3 style="color: #EE424B;">Can I tip coins to a friend?</h3>
        <p>No why would we have that feature? You don't have friends!</p>
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
</body>
</html>