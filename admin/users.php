<?php
    session_start();
    require_once('../includes/connection.php');

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../adminLogin.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="../css/master.css" type="text/css">
</head>
<body>
    <h1>Welcome <?= ($_SESSION["userName"]) ? $_SESSION["userName"] : '' ?></h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>SSN</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * from user";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                    // Store the cipher method
                    $ciphering = "AES-128-CTR";
                      // Non-NULL Initialization Vector for decryption
                    $decryption_iv = '1234567891011121';
                    // Store the decryption key
                    $options = 0;
                    $decryption_key = "GeeksforGeeks";
                    // Use openssl_decrypt() function to decrypt the data
                    $decryptionSSN = openssl_decrypt ($row["ssn"], $ciphering, $decryption_key, $options, $decryption_iv);
                    echo "<tr><td>" . $row["userID"]. "</td><td>" . $row["firstName"]. " " . $row["lastName"]. "</td><td>".$row["phoneNumber"]."</td><td>".$row["address"]."</td><td>".$decryptionSSN."</td></tr>";
                  }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
            ?>
        </tbody>
    </table>
    <a href='../includes/logout.php' title='Logout'> Logout </a>
    <?php mysqli_close($con); ?>
</body>
</html>
