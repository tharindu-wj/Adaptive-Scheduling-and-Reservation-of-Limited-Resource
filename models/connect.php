<?php

$host = "localhost";
$user = "root";
$psswrd = "";
$db = "project";
global $con;
$con = mysqli_connect($host, $user, $psswrd) or die("Connection failed");
//if($con) echo "Connected-OK!!!<br>";

$test = mysqli_select_db($con, $db) or die(mysqli_error($con));
//if($test) echo "Select database<br>";

//$conn=mysql_connect($host, $user, $psswrd)or die(mysql_error()); 

//mysql_select_db($db,$conn)or die(mysql_error());

?>