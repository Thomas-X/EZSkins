<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Search
    </title>
    <link rel="stylesheet" href="item.css">
    <link rel="stylesheet" href="../../../css/font-awesome.css">
</head>
<body>
<h1>have static homepage of webshop with popular items, use API or just do it manual, it's 20 items or so, however many
    fit</h1>
<h1>change output in search.php to something like this drawing:
    C:\Users\Thomas X\Documents\ShareX\Screenshots\2016-11\PaintDotNet_2016-11-10_21-13-56</h1>

<?php

$getcurrentpage = $_GET['page'];

$getcurrentpagemath = $getcurrentpage + 1; //search is getting overwritten somewhere above
//$search = $_GET['search'];

echo "<form action=\"search.php?page=$getcurrentpagemath\" method=\"post\">
    <input name=\"search\" type=\"text\">
    <input type=\"submit\" value=\"Submit\" name=\"submit\">
    </form>";


$getsearch = @$_POST['search'];
$getpage = 0;
//var_dump($getsearch);


if (@$_POST['submit']) {
    header("Location: search.php?page=$getpage&search=$getsearch");
}

if (isset($_GET['page']) && isset($_GET['search'])) {
    $connect = mysqli_connect("localhost", "root", "admin", "ezskins");


    $usersearch = mysqli_real_escape_string($connect, $_GET['search']);


//for the AK-47 and Five-SeveN and other names with ""
//if (strpos("$usersearch", "-") === false) {
//    //nothing found, so we continue
//}
//else {
//    $userseachnobaddies = str_replace("", " ", $usersearch);
//}
//    unset($usersearchexploded);
    $usersearchexploded = explode(" ", $usersearch);
//    var_dump($usersearchexploded);
    $arraycount = count($usersearchexploded);
    $page = ($_GET['page']);
//    var_dump($page);
    $pageclean = $page * 10;


    for ($counter = 0; $counter < $arraycount; $counter++) {
        $usersearchfinal = $usersearchexploded[$counter];
        $query = mysqli_query($connect, "SELECT * FROM skins WHERE marketname LIKE '%$usersearchfinal%' ORDER BY marketname LIMIT 10 OFFSET $pageclean");
    }
    $output = '';
    $countamountfind = mysqli_num_rows($query);
//    '<br><a>' . $searchoutput . '</a>'

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
        <a href="add_to_cart?id=' . $id . '"><button class="button-css">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>ADD TO CART</button></a>
    </div>
</div>';
        }

//        $howmanypages = $countamountfind / 20;
//
//        ceil($howmanypages);
//        while ($counter2 < $howmanypages) {
//
//        }
    }
//    var_dump($query);
//    var_dump($countamountfind);
//    var_dump($searchoutput);
//    var_dump($imgsrc);
//    var_dump($price);
//    var_dump($itemcolor);
//    var_dump($id);
    echo "<div class='flex-container'>";
    if ($output) {
        echo $output;
    }
    echo "</div>";
    if (!$countamountfind < 10) { //if it's less, there's no next page to go to
        echo "<a href='search.php?page=$getcurrentpagemath&search=$getsearch'>Next Page</a>";
    }


}


?>

</body>
</html>
