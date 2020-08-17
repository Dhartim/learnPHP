<?php
  // //connect to SQLiteDatabase
  require_once('connection.php');
  //insert into db

  if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

    // Escape user inputs for security
    $firstName = mysqli_real_escape_string($con, $_REQUEST['firstName']);
    $lastName = mysqli_real_escape_string($con, $_REQUEST['lastName']);
    $phoneNumber = mysqli_real_escape_string($con, $_REQUEST['phoneNumber']);
    $address = mysqli_real_escape_string($con, $_REQUEST['address']);
    $ssn = mysqli_real_escape_string($con, $_REQUEST['ssn']);
    // Store the cipher method
    $ciphering = "AES-128-CTR";
    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';
    // Store the encryption key
    $encryption_key = "GeeksforGeeks";
    // Use openssl_encrypt() function to encrypt the data
    $encryptionSSN = openssl_encrypt($ssn, $ciphering,
                $encryption_key, $options, $encryption_iv);
    // Display the encrypted string
    //echo "Encrypted String: " . $encryptionSSN . "\n";

    // Attempt insert query execution
    $sql = "INSERT INTO user (firstName, lastName, phoneNumber, address, ssn) VALUES ('$firstName', '$lastName', '$phoneNumber', '$address', '$encryptionSSN')";
    if(mysqli_query($con, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    // Close connection
    mysqli_close($con);
  }

?>
