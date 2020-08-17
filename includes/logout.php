<?php
session_start();
$_SESSION = array();
session_destroy();
/*unset($_SESSION["userName"]);
unset($_SESSION["pwd"]);*/
header("Location:../adminLogin.php");
exit;
?>
