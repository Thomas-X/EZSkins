<?php
/**
 * Created by IntelliJ IDEA.
 * User: Thomas X
 * Date: 11/9/2016
 * Time: 10:07 AM
 */
echo "You are being redirected..";
session_start();
session_destroy();
unset($_SESSION['cart']);
unset($_SESSION['username']);
unset($_SESSION);

header('Location: login.php');
?>