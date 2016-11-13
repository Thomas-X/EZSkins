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
    }
    else {
        echo "<script type='text/javascript'>alert('STOP MESSING WITH THE URL!! :D');</script>";
    }
}
//else {
//    echo "<script type='text/javascript'>alert('STOP MESSING WITH THE URL!! :D');</script>";
//}


//only unique items in the cart, please
$arrayunique = array_unique($_SESSION['cart']);
array_values($arrayunique);
$arrayfinal = $arrayunique; //im lazy..
//adding remove buttons
$counter = 0;
$buttonstoadd = count($_SESSION['cart']);





foreach ($arrayfinal as $counter) {
    echo "<form method='get'><input id='$counter' type='submit' name='remove' value='$counter' onclick='removeButton(this.id)'></form>";
    $counter++;
}

//end
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Search
    </title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="../../../css/font-awesome.css">
    <script src="js/removeButton.js"></script>
</head>
<body>

<?php

$getcurrentpage = @$_GET['page'];
$getcurrentpagemath = $getcurrentpage + 1;


if (@$_GET['search'] == '') {
    echo "Search here";
}


echo "<form action=\"search.php?page=$getcurrentpagemath\" method=\"post\">
    <input name=\"search\" type=\"text\">
    <input type=\"submit\" value=\"Submit\" name=\"submit\">
    </form>";



$getsearch = @$_POST['search'];
$getsearch2 = @$_GET['search'];
$getpage = 0;



if (@$_POST['submit']) {
    header("Location: search.php?page=$getpage&search=$getsearch");
}


if (isset($_GET['page']) && isset($_GET['search']) && ($_GET['search'] != '')) {
    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");


    $usersearch = mysqli_real_escape_string($connect, $_GET['search']);

    $usersearchexploded = explode(" ", $usersearch);

    $arraycount = count($usersearchexploded);
    $page = ($_GET['page']);

    $pageclean = $page * 10;


    for ($counter = 0; $counter < $arraycount; $counter++) {
        $usersearchfinal = $usersearchexploded[$counter];
        $query = mysqli_query($connect, "SELECT * FROM skins WHERE marketname LIKE '%$usersearchfinal%' ORDER BY marketname LIMIT 10 OFFSET $pageclean");
    }
    $output = '';
    $countamountfind = mysqli_num_rows($query);


    if ($countamountfind == 0) {
        echo "No results found!!";
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


            $output .= '<div class="item-frame"> <div class="top-item-frame" style="color:#' . $itemcolor . ';padding-top:15px;padding-bottom:15px;"><a>' . $searchoutput . '</a></div>
    <div class="picture-item-frame"><img src="' . $imgsrc . '" > </div>
    <div class="price-item-frame">€' . $price . '</div>
    <div class="button-item-frame">
        <a href="search.php?page=' . $getcurrentpage . '&search=' . $getsearch2 . '&id=' . $id . '"><button class="button-css">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</button></a>
    </div>
</div>';
        }
    }

    echo "<div class='flex-container'>";
    if ($output) {
        echo $output;
    }
    echo "</div>";

    if ($countamountfind == 10) { //if it's less, there's no next page to go to
        echo "<a href='search.php?page=$getcurrentpagemath&search=$getsearch2'>Next Page</a>";
    }
}
?>
</body>
</html>
