<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testing</title>
</head>
<body>
<?php
include_once ("Database.php");
include_once ("opdrachten/RadioProgram.php");


$mysqliconnect = new mysqli('localhost', 'root', 'admin', 'ezskins');

if ($mysqliconnect->connect_errno) {
    echo "OH NO";
    exit;
}
else {
    echo "OH YEAH AAHAHAH";
}


$radioprogram = new RadioProgram();

$radioprogram->setSong("hai2");
$radioprogram->getSongs();



?>

</body>
</html>