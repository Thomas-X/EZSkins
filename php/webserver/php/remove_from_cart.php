<?php
/**
 * Created by IntelliJ IDEA.
 * User: Thomas X
 * Date: 11/9/2016
 * Time: 10:56 AM
 */
session_start();
if ($_GET['remove']) {
    unset($_SESSION['cart']);
    header('Location: add_to_cart.php');
    exit();
}


?>

<html>
<head>
    <title>asd
    </title>
<body>

<h1>Cleared cart</h1>

<?php
var_dump($_SESSION['cart']);
?>
</body>
</head>
</html>
