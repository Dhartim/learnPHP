<?php
  require_once('connection.php');
  //start session in php
  session_start();
  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("location: ../admin/users.php");
      exit;
  }

  if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    if(empty($_POST["userName"])) {
      $error = "Please enter a username.";
    }
    else if(empty($_POST["pwd"])) {
      $error = "Please enter your password.";
    }
    else {
        $adminName = mysqli_real_escape_string($con, $_REQUEST['userName']);
        $pwd = mysqli_real_escape_string($con, $_REQUEST['pwd']);
        $sql = "SELECT * FROM admin WHERE username = '".$adminName."' AND password = '".$pwd."'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
           $_SESSION["loggedin"] = true;
            $_SESSION["userName"] = $_row["username"];

            mysqli_close($con);
            header("location: ../admin/users.php");
        }
    }
  }

  mysqli_close($con);
  header("location: ../adminLogin.php");
?>
