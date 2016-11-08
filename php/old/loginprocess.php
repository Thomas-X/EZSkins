<?php
error_reporting(-1);
function savecredentials()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username;
    echo $password;
    $connect = mysqli_connect("localhost", "root", "", "ezskins");
    $result = mysqli_query($connect, "insert into logindata (username, password) values ('$username','$password')");
    if ($result) {
        echo "REGISTERED";
    } else {
        echo "FAILED";
    }
}
savecredentials();