<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RadioProgram</title>
</head>
<body>

<?php
include_once("RadioProgram.php");
include_once("Liedje.php");

//set
$ditprogramma = new RadioProgram();
$ditprogramma->setNaam("Mijn awesome Programma van radio zender stuff");
$ditprogramma->setOmschrijving("Mijn awesome Omschrijving van radio zender stuff");

foreach ($ditprogramma->getProgramma() as $p) {
    echo $p."<br>";
}

$Songs = new Liedje("SomeSong", "SomeArtist");
echo $Songs->getTitel()." - ";
echo $Songs->getArtiest();

foreach ($ditprogramma->getSongs() as $i) {
    echo $i."<br>";
}





?>


</body>
</html>