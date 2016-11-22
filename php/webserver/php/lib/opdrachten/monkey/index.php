<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monkey</title>
    <link rel="stylesheet" href="css/monkey.css">
    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
</head>
<body>


<img id="monkey" src="https://d13yacurqjgara.cloudfront.net/users/230541/screenshots/1200283/monkey_logo.jpg">



<?php


include_once("lib/ReadMonkey.php");

$readmonkey = new ReadMonkey();

$readmonkey->setfileDir("txt/monkeys.txt");
$readmonkey->getFile();

?>

<div style="width:100%;text-align:center">
    <?php echo $readmonkey->redirect(); ?>
</div>

</body>
</html>