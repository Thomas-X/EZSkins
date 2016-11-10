<?php


//copy pasta for optizming search engine


$thisword = " |";
$shouldbe = "";
$thistable = "skins";

MySQL_replace_all($thisword, $shouldbe, $thistable);

function MySQL_replace_all($thisword,$shouldbe,$thistable){

    $connection = mysqli_connect("localhost", "root", "admin", "ezskins");
    $cnamnes = "SHOW columns FROM " . $thistable;
    $result = mysqli_query($connection, $cnamnes);
    while($columnname = mysqli_fetch_row($result)){
        $connection = mysqli_connect("localhost", "root", "admin", "ezskins");
        $replace_SQL = "UPDATE $thistable SET ". $columnname[0] ." = REPLACE(". $columnname[0] .",'". $thisword ."', '". $shouldbe ."');";
        echo $replace_SQL . "<br>";
        mysqli_query($connection, $replace_SQL);
    }
}

?>