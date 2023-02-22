
<?php
include '../../../../carlRandomizer/config/dbcon.php';


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$gender = $_POST['gender'];

// Step 4: Sanitize and validate form data
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$dob = mysqli_real_escape_string($conn, $dob);
$address = mysqli_real_escape_string($conn, $address);
$gender = mysqli_real_escape_string($conn, $gender);

// Step 5: Construct SQL query
$sql = "INSERT INTO students (name, email, phone, dob, address, gender)
        VALUES ('$name', '$email', '$phone', '$dob', '$address', '$gender')";

// Step 6: Execute SQL query
if (mysqli_query($conn, $sql)) {
    
    header("location: ../../../../../../carlRandomizer/main/LOGIN/loginPage.php");
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}

// Step 7: Close database connection
mysqli_close($conn);
?>
