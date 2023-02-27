<?php
date_default_timezone_set('Asia/Manila');
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'C:\xampp\php\logs\php_error_log');

include '../../../../carlRandomizer/config/dbcon.php';

$username = $_POST['username'];
$password = $_POST['password'];


// Sanitize and validate form data
$username = mysqli_real_escape_string($conn, $username);
$password =  mysqli_real_escape_string($conn,md5($password));

// Step 5: Construct SQL query
$sql = "INSERT INTO tbl_activate (username,password)
        VALUES ('$username','$password')";

// Step 6: Execute SQL query
if (mysqli_query($conn, $sql)) {
   echo 'DATA SENT TO DATABASE!';
   header("location: ../../../../../../carlRandomizer/main/LOGIN/loginPage.php");
   //sleep(3);
    
} else {
    echo "Error inserting record: " . mysqli_error($conn);
    
}
return;

//  Close database connection
mysqli_close($conn);
?>
