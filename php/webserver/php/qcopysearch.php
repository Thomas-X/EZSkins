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
