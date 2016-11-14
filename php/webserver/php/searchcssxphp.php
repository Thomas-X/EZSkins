<?php
header("Content-type: text/css; charset: UTF-8");
session_start();
?>
#navitemcolor6:before {
    content: 'Hello, <?php echo $_SESSION['username'] ?>';
}
#navitemcolor6:hover:before {
    content: 'Log out?';
}