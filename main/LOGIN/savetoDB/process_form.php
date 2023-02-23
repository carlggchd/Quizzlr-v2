<?php
date_default_timezone_set('Asia/Manila');
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'C:\xampp\php\logs\php_error_log');

include '../../../../carlRandomizer/config/dbcon.php';

$username = $_POST['username'];
$password = $_POST['password'];
$Fname = $_POST['Fname'];
$Mname = $_POST['Mname'];
$Lname = $_POST['Lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$gender = $_POST['gender'];

// Sanitize and validate form data
$username = mysqli_real_escape_string($conn, $username);
$password =  mysqli_real_escape_string($conn,md5($password));
$Fname = mysqli_real_escape_string($conn, $Fname);
$Mname = mysqli_real_escape_string($conn, $Mname);
$Lname = mysqli_real_escape_string($conn, $Lname);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$dob = mysqli_real_escape_string($conn, $dob);
$address = mysqli_real_escape_string($conn, $address);
$gender = mysqli_real_escape_string($conn, $gender);

// Step 5: Construct SQL query
$sql = "INSERT INTO tbl_activate (username,password, First_Name, Middle_Name , Last_Name , email, phone, dob, address, gender)
        VALUES ('$username','$password', '$Fname', '$Mname' , '$Lname' ,'$email', '$phone', '$dob', '$address', '$gender')";

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
