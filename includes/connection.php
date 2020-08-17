<?php
$db_serverName = "localhost";
$db_userName = "root";
$db_pswd = "root";
$db_name = "userDetails";

$con = mysqli_connect($db_serverName, $db_userName, $db_pswd, $db_name);
if($con === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
 ?>
