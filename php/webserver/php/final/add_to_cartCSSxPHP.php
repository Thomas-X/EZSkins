<?php
header("Content-type: text/css; charset: UTF-8");
session_start();

if (isset($_SESSION['username'])) {
    $var01 = $_SESSION['username'];
    $var1 = "Hello, $var01";
    $var2 = "Log out?";
}
else {
    $var1 = "Login or Sign up.";
    $var2 = "Login or Sign up.";
}



?>
#navitemcolor6:before {
content: '<?php echo $var1; ?>';
}
#navitemcolor6:hover:before {
content: '<?php echo $var2; ?>';
}