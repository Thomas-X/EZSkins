<?php
if (isset($_POST['submit'])) {


$connect = mysqli_connect("localhost", "root", "admin", "ezskins");

$usersearch = mysqli_real_escape_string($connect, $_POST['search']);



//for the AK-47 and Five-SeveN and other names with ""
//if (strpos("$usersearch", "-") === false) {
//    //nothing found, so we continue
//}
//else {
//    $userseachnobaddies = str_replace("", " ", $usersearch);
//}



    $usersearchexploded = explode(" ", $usersearch);
    var_dump($usersearchexploded);


    $arraycount = count($usersearchexploded);


    //replace all "-" with spaces

    //if user enters "-" replace with spaces


    //for better search

    for ($counter = 0; $counter < $arraycount; $counter++) {
        $usersearchfinal = $usersearchexploded[$counter];
        $query = mysqli_query($connect, "SELECT * FROM skins WHERE marketname LIKE '%$usersearchfinal%'");
    }

    $output = '';
    $countamountfind = mysqli_num_rows($query);

    if ($countamountfind == 0) {
        echo "No results found!!";
    } else {
        while ($row = mysqli_fetch_array($query)) { //no idea what this is, really
            $searchoutput = $row['marketname'];
            $output .= '<br><a>' . $searchoutput . '</a>';
        }
    }

    var_dump($query);
    var_dump($countamountfind);
    if ($output) {
        echo $output;
    }
}
?>


<html>

<head>
    <title>
        Search
    </title>
</head>
<body>
<form action="search.php" method="post">
    <input name="search" type="text">
    <input type="submit" value="Search >>" name="submit">
</form>
<h1>have static homepage of webshop with popular items, use API or just do it manual, it's 20 items or so, however many fit</h1>
<h1>change output in search.php to something like this drawing:
    C:\Users\Thomas X\Documents\ShareX\Screenshots\2016-11\PaintDotNet_2016-11-10_21-13-56</h1>

<?php

?>


</body>
</html>
