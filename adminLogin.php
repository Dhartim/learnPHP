<?php
  session_start();
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin/users.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="css/master.css" type="text/css">
    <title></title>
  </head>
  <body>
    <form class="" action="includes/admin.php" method="post">
      <div class="login">
        <input type="text" name="userName" placeholder="Username" id="username" required autocomplete="off"/>
        <input type="password" name="pwd"  placeholder="password" id="password" required autocomplete="off"/>
        <input type="submit" value="Sign In">
      </div>
    </form>
  </body>
</html>
