<?php

$serverName = "localhost";
$dBusername = "root";
$dBPassword = "";
$dBName = "dragon";

$conn = mysqli_connect($serverName, $dBusername, $dBPassword, $dBName);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
?>
