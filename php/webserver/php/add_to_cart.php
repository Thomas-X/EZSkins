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
    var_dump($enteredid);
    $getvalidid = mysqli_query($connect, "SELECT * FROM skins WHERE id='$enteredid'");
    var_dump($getvalidid);
    //push the current ID to the cart array, if the ID is valid
    if ($getvalidid) {
        array_push($_SESSION['cart'], $_GET['id']);

        //so we don't get null items when you go to your cart directly without adding 'items'
        array_filter($_SESSION['cart']);

    }
    else {
        echo "Stop messing with the URL please, it's not gonna work.";
    }
}

if (isset($_GET['remove'])) {
    //unset local array
//    $findwhichonetoremove = array_search($_GET['remove'], $arrayfinal);
//    unset($arrayfinal[$findwhichonetoremove]);
//    $arrayreallyfinal = array_values($arrayfinal);

    //unset SESSION array aswell
    $findwhichonetoremove2 = array_search($_GET['remove'], $_SESSION['cart']);
    unset($_SESSION['cart'][$findwhichonetoremove2]);
    $arrayfinalunique = array_unique($_SESSION['cart']);
    $arrayfinal = array_values($arrayfinalunique);



}

//only unique items in the cart, please
$arrayunique = array_unique($_SESSION['cart']);

//because array_unique doesn't recalculate keys
$arrayfinal = array_values($arrayunique);

//dump the contents of the array

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <title>Current shopping cart</title>
    <script src="js/removeButton.js"></script>
    <link rel="stylesheet" href="../css/add_to_cart.css">
</head>
<body>

<br><a href="remove_from_cart.php?remove=1">Remove items from cart</a>
<br><a href="cartitems.php">Add items to cart</a>
<br>


<?php
$counter = 0;
$buttonstoadd = count($_SESSION['cart']);


//TODO get item ID's name and make that the value of button (db query)
foreach ($arrayfinal as $counter) {
    echo "<form method='get'><input id='$counter' type='submit' value='$counter' name='remove' onclick='removeButton(this.id)'></form>";
    $counter++;
}
//remove$counter
//for ($counter2 = 0; $counter2 < $counter; $counter2++) {
//    echo "<?php if(isset($counter2)) { unset($arrayfinal[$counter2]); }
//}
//array_values($_SESSION['cart']);
var_dump($arrayfinal);
?>

<h1>TODO: Make it so you can't just put any ?id=(anything) in the URL, only ID's that the database knows (do this with
    queries)</h1>
<h1>TODO: make search options, e.g "Battlescarred", "Well worn", etc</h1>
<h1>TODO: add "already added to cart option" if item already is in cart </h1>
</body>
</html>
