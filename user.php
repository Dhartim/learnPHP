<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/master.css" type="text/css">
    <title></title>
  </head>
  <body>
    <form class="" action="/user-management/includes/userform.php" method="post">
      <div class="userForm">
        First Name: <input type="text" name="firstName" value="" required>
        Last Name: <input type="text" name="lastName" value="" required>
        Phone Number: <input type="tel" name="phoneNumber" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="1231231234"required>
        Full Address: <input type="text" name="address" value="" required>
        SSN: <input type="text" name="ssn" value="" pattern="\d{3}[\-]\d{2}[\-]\d{4}" placeholder="123-12-1234"required>
        <input type="submit" name="submit" value="Submit">
    </div>
    </form>
  </body>
</html>
