<?php
session_start();
//if the cart isn't set to an array already
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
//if the $_GET ID is NOT empty do this
if (isset($_GET['id'])) {

    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");
    $enteredid = $_GET['id'];

    $getvalidid = mysqli_query($connect, "SELECT * FROM skins2 WHERE id='$enteredid'");
    $countvalididrows = mysqli_num_rows($getvalidid);


    //push the current ID to the cart array, if the ID is valid
    if ($countvalididrows != 0) {
//        $sessioncart = $_SESSION['cart'];
//        $sessiongetid = $_GET['id']; NO, BAD VARIABLE, YOU NO WORK!!! :(



        $arraypush = array_push($_SESSION['cart'], $_GET['id']);


        if ($arraypush) {
            echo "<article id=\"success\" class=\"message is-success\" style='margin-bottom:0;transition: height 300ms linear;height:34px;'>
            <div class=\"message-header\">
                Added to your cart!
            </div>
        </article>";
            echo "<script type='text/javascript' src='js/success.js'>;</script>";
        }


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
//else {
//    echo "<script type='text/javascript'>alert('STOP MESSING WITH THE URL!! :D');</script>";
//}


//only unique items in the cart, please
//end
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Search
    </title>
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="sideNav/index.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="stylesheet" href="searchcssxphp.php">

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
        } else {
            echo "<a href='login.php?lastpage=search.php' id=\"navitemcolor6\" class='nav-item is-noactive'>
        
    </a>";
        }
        ?>
        <a id="navitemcolor1" class="nav-item is-noactive" href="../webshop/webshop.html">
            Shop
        </a>
        <a id="navitemcolor2" class="nav-item is-noactive" href="../news/news.php">
            News
        </a>
        <a id="navitemcolor3" class="nav-item is-noactive" href="../about/about.php">
            About
        </a>
        <a id="navitemcolor4" class="nav-item is-noactive" href="faq.html">
            FAQ
        </a>
        <a id="navitemcolor5" class="nav-item is-noactive" href="../contact/contact.php">
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

$getsearch = @$_POST['search'];
$getsearch2 = @$_GET['search'];
$getpage = 0;



echo "<div class='flex-container'>";

//post template stuff here
echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>Desert Eagle Conspiracy (Factory New)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PDdTjlH7du6kb-KguXxJqjummJW4NE_3e_Aotql3QO3qUNpNWugddSdcA9sNFzU8ge_w-6-0JO4vJrIzCZj7z5iuygmT5QrCQ"> </div>
    <div class="price-item-frame">€115 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=Desert Eagle Conspiracy&amp;id=1968"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>Five-SeveN Monkey Business (Minimal Wear)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLOzLhRlxfbGTj5X09q_goWYkuHxPYTTl2VQ5sROhuDG_Zi72lDj8xJqZWj3d9SWcA9vNQnY81Ltybrvh57p7piayyBnsiV053mLnwv330_hwP2Y_Q"> </div>
    <div class="price-item-frame">€186 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=Five SeveN Monkey Business&amp;id=2302"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>UMP-45 Blaze (Factory New)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo7e1f1Jf0vL3dzFD4dmlq4yCkP_gfeuCxTMG7pFw2uiV9I-jjlHi-0dvZDygLY-dJw89NQ3QqFK3lOe9jcSi_MOeUg1XNk4"> </div>
    <div class="price-item-frame">€175 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=Ump-45 blaze&amp;id=8038"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>P90 Death by Kitty (Minimal Wear)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopuP1FAR17PDJZS5J-dC6h7-bzqfLP7LWnn8fuMN32OqU9tmmiQLt-hZuaz2mJITGJgFsZViF-Vi7levs0Z7vupXLz2wj5HegSjteqg"> </div>
    <div class="price-item-frame">€401 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=P90 Death By Kitty&amp;id=3527"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>AK-47 Vulcan (Factory New)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJemkV086jloKOhcj4OrzZgiUEsJYnibqZ8d-l2wO1_hJtNWDzctDBIQ5taAzQqFi6wujo1se06cud1zI97ZAmS4pT"> </div>
    <div class="price-item-frame">€349 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=Ak-47 Vulcan&amp;id=1613"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>AUG Chameleon (Factory New)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot6-iFAR17PLddgJB5N27kYyOmPn1OqnUqWdY781lxLiW9Nr2iwzh_xFpMW70cYeXIQE4ZwnR-wW5w--9gZPuvpjMziNrvyk8pSGK5tyGFpE"> </div>
    <div class="price-item-frame">€298 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=Aug Chameleon&amp;id=1641"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>Galil AR Chatterbox (Field-Tested)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbupIgthwczLZAJF7dC_mL-KleX1ILLemFRc7cF4n-SPodvz2gzjrUE4ZWyld4_DdlBrNAyC_ge4xr_qhZO-7s_PwXRmsnJw7GGdwUI2M1HQMQ"> </div>
    <div class="price-item-frame">€759 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search= Galil Chatterbox&amp;id=2439"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>AWP Hyper Beast (Factory New)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FAR17PLfYQJK9cyzhr-JkvbnJ4Tdn2xZ_Ismju2To9qm31Hsr0ZsMTryJo_BcANrMwyCrFLrx7vrhJa1vZrByXo2pGB8sr2_Epwm"> </div>
    <div class="price-item-frame">€429 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=M4A1-S Hyper Beast&amp;id=1801"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>Negev Bratatat (Factory New)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpouL-iLhFf0Ob3cy9D-N2ilZS0mfLzNq3ummJW4NE_iL6UrdX22wfhrRFrY2_1cIOWIAc2aF-F-lG-l-7shMK_vZvPzXM2vD5iuyhjALW35A"> </div>
    <div class="price-item-frame">€91 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=Negev Bratatat&amp;id=3169"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>M249 System Lock (Factory New)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-jxcjhjxszFI2kb08-zn5SEhcj4OrzZgiVSsZAmj76R9tqg3gTm_xFuMGn1JtCSI1A8YVvRq1a4krzs1p6_6pya1zI97fYyj9_i"> </div>
    <div class="price-item-frame">€90 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=system&amp;id=2652"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>AWP Pink DDPAT (Factory New)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FA957PfMYTxW08y_mou0m_7zO6-flzsB6sBzj-jFodqiiQPl-0VsZWvzIY6cegRvYA7Y_FS_krjpg5Xu74OJlyXUk8gSnw"> </div>
    <div class="price-item-frame">€716 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=AWP Pink DDPAT&amp;id=1817"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

echo '<div class="item-frame"> <div class="top-item-frame" style="color:#D2D2D2 !important;padding-top:15px;padding-bottom:15px;"><a>Sawed-Off The Kraken (Factory New)</a></div>
    <div class="picture-item-frame"><img src="//steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopbuyLgNv1fX3cih9_92hkYSEkfHLPLjFmXtE5dVOhuDG_Zi73wLlrxVpamjycdDGdFc3Z1jW-wK5k-3r0JK97Z-fn3Q26SYjsHrVzQv330-41vffvw"> </div>
    <div class="price-item-frame">€217 </div>
    <div class="button-item-frame">
        <a href="search.php?page=0&amp;search=Sawed-Off The Kraken&amp;id=3805"><button class="button-css">
            <i class="fa fa-shopping-basket" aria="" -="" hidden="true"></i> ADD TO CART </button></a>
    </div>
</div>';

//stuff end here



if (@$_POST['submit']) {
    header("Location: search.php?page=$getpage&search=$getsearch");
}


if (isset($_GET['page']) && isset($_GET['search']) && ($_GET['search'] != '')) {
    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");


    $usersearch = mysqli_real_escape_string($connect, $_GET['search']);

    $usersearchexploded = explode(" ", $usersearch);

    $arraycount = count($usersearchexploded);
    $page = ($_GET['page']);

    $pageclean = $page * 12;


    for ($counter = 0; $counter < $arraycount; $counter++) {
        $usersearchfinal = $usersearchexploded[$counter];
        $query = mysqli_query($connect, "SELECT * FROM skins WHERE marketname LIKE '%$usersearchfinal%' ORDER BY marketname LIMIT 12 OFFSET $pageclean");
    }
    $output = '';
    $countamountfind = mysqli_num_rows($query);
    $boolean = false;

    if ($countamountfind == 0) {
        $boolean = true;
    } else {
        while ($row = mysqli_fetch_array($query)) { //I UNDERSTAND THIS NOW YAAAY
            $searchoutput = $row['marketname'];
            $imgsrc1 = mysqli_query($connect, "SELECT icon_url from skins where marketname like '$searchoutput'");
            $price1 = mysqli_query($connect, "SELECT price from skins where marketname like '$searchoutput'");
            $itemcolor1 = mysqli_query($connect, "SELECT name_color FROM skins WHERE marketname like '$searchoutput'");
            $id1 = mysqli_query($connect, "SELECT id from skins where marketname like '$searchoutput'");

            //Fetch result of query because it's an object, we can't parse that
            $itemcolorarray = mysqli_fetch_assoc($itemcolor1);
            $itemcolor = $itemcolorarray['name_color'];
            //Fetch result of query
            $imgsrcarray = mysqli_fetch_assoc($imgsrc1);
            $imgsrc = $imgsrcarray['icon_url'];
            //Fetch result of query
            $pricearray = mysqli_fetch_assoc($price1);
            $price = $pricearray['price'];
            //Fetch result of query
            $idarray = mysqli_fetch_assoc($id1);
            $id = $idarray['id'];

            $getcurrentpage = @$_GET['page'];
            $output .= '<div class="item-frame"> <div class="top-item-frame" style="color:#' . $itemcolor . ' !important;padding-top:15px;padding-bottom:15px;"><a>' . $searchoutput . '</a></div>
    <div class="picture-item-frame" ><img src = "' . $imgsrc . '" > </div >
    <div class="price-item-frame" >€' . $price . ' </div >
    <div class="button-item-frame" >
        <a href = "search.php?page=' . $getcurrentpage . '&search=' . $getsearch2 . '&id=' . $id . '"><button class="button-css" >
            <i class="fa fa-shopping-basket" aria - hidden = "true" ></i > ADD TO CART </button ></a >
    </div>
</div > ';
        }
    }
    $getcurrentpage = @$_GET['page'];
    $getcurrentpagemath = $getcurrentpage + 1;

    if ($boolean) {
        echo "<span style='color: #fffbeb;font-size: 8vh;margin: 20px;'>No results found! :(</span>";
    }
    if ($output) {
//        echo "<script>document.getElementsByClassName('mainpagecontainer').style.display = ''</script>";
        echo $output;
    }
}
echo "</div>";

//echo "<form action=\"search.php?page=$getcurrentpagemath\" method=\"post\">
//    <input name=\"search\" type=\"text\">
//    <input type=\"submit\" value=\"Submit\" name=\"submit\">
//    </form>";
$getcurrentpage = @$_GET['page'];
$getcurrentpagemath = $getcurrentpage + 1;


echo "<div class=\"side-nav-frame\" style='border-top:2px solid #EE424B;'>
    <div class=\"side-nav-title\">
        <span>Search Bar</span>
    </div>

    <div class=\"side-nav-form\" style='margin:5px;'>
    <form id='form' action=\"search.php?page=$getcurrentpagemath\" method=\"post\" style='margin-top:25px;text-align:center;'>
    <input id='inputField' name=\"search\" type=\"text\"  placeholder=\"Search here..\" style='height:32px;margin-bottom:11px;'>
    <input id='buttonInput' class='button is-primary' type=\"submit\" value=\"Search\" name=\"submit\" style='width:144px;'>
    </form>
    </div>";
@$getcurrentpage2 = $_GET['page'];
@$getsearch12 = $_GET['search'];
$getcurrentpagemath2 = $getcurrentpage2 - 1;
echo "<div style='width: 100%;margin:auto;text-align: center'>";
if (@$countamountfind && @$getcurrentpage2 != 0) {
    echo "<a class='button is-info' href='search.php?page=$getcurrentpagemath2&search=$getsearch12' style='font-size:1.5vh;text-align:center;width:84px;'>Previous Page </a>";

}
if (@$countamountfind == 12) { //if it's less, there's no next page to go to
    echo "<a class='button is-info' href='search.php?page=$getcurrentpagemath&search=$getsearch2' style='margin-left:5px;font-size:1.5vh;text-align:center;width:84px;'>Next Page</a>";
}
echo "</div>";


?>
</body>
</html>
