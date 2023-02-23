<?php
//connect to database
$servername = "localhost";
$username = "root";
$password = "Aclan*2020";
$dbname = "quizrandomizerdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

