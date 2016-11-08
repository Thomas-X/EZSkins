<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "Hello, " . $_SESSION['username'];
}
else {
    header('Location: login.php');
    exit();


//TODO MAKE MD5 ENCRYPTION WITH PHP AND MAYBE LOGIN ISN'T NEEDED? CART WITH $_SESSION
}

