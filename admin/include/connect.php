<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "reservation";

$conn =  mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    echo "Connection failed please check your source code";
}

?>
