<?php 
session_start(); 

//checks who logged in and who is the current user
if (!isset($_SESSION['student_id'])) {
	header('Location: ../../../../../carlRandomizer/main/LOGIN/login.php');
	exit();
  }

// checks if the logged in user is already done with the registration
include "../../../carlRandomizer/config/dbcon.php";
$student_id = $_SESSION['student_id'];
$loginCheck = mysqli_query($conn, "SELECT * FROM tbl_student_info WHERE student_id = $student_id");
if (mysqli_num_rows($loginCheck) > 0) {
	header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=User already registered! you can start the quiz now or logout and register a new account.");
	exit();
}


if (isset($_POST['firstName']) && isset($_POST['middleName'])
    && isset($_POST['lastName']) && isset($_POST['email'])
	&& isset($_POST['phone'])  && isset($_POST['dateofBirth'])
	&& isset($_POST['address']) && isset($_POST['gender'])  ){

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$firstName = validate($_POST['firstName']);
	$middleName = validate($_POST['middleName']);
	$lastName = validate($_POST['lastName']);
	$email = validate($_POST['email']);
	$phone = validate($_POST['phone']);
	$dateofBirth = validate($_POST['dateofBirth']);
	$address = validate($_POST['address']);
	$gender = validate($_POST['gender']);


	$user_data = 'firstName='. $firstName . '&lastName='. $lastName;
	$dob = new DateTime($dateofBirth);
	$now = new DateTime();

	if (empty($firstName)) {
		header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=First Name cannot be empty!&$user_data");
	    exit();
    }
	else if(empty($middleName)){
        header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Middle Name cannot be empty!&$user_data");
	    exit();
	}
	else if(empty($lastName)){
        header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Last Name cannot be empty!&$user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Please enter your email!&$user_data");
	    exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Invalid email format!&$user_data");
		exit();
	} 
	else if (strpos($email, ' ') !== false) {
		header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Email cannot contain spaces!&$user_data");
		exit();
	}
	else if(empty($phone) || !preg_match('/^[0-9]{11}$/', $phone)){
		header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Please enter a valid 11 digit phone number&$user_data");
		exit();
	}
	else if(empty($dateofBirth)){
		header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Please enter your date of birth&$user_data");
		exit();
	}else if($dob > $now){
			header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Date of birth cannot be in the future!&$user_data");
			exit();
	}
	else if(empty($address)){
        header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Address cannot be blank!&$user_data");
	    exit();
	}
	else if(empty($gender)){
		header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Please choose one of the options!&$user_data");
		exit();
	}


	else{

	    $sql = "SELECT * FROM tbl_student_info WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=The email is taken, try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO tbl_student_info(student_id, First_Name, Middle_Name, Last_Name, email, phone, Birth_Date, address, gender) 
		   VALUES($student_id,'$firstName', '$middleName', '$lastName', '$email', '$phone', '$dateofBirth', '$address', '$gender')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?success=Your account has been updated!");
	         exit();
           }else {
	           	header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: ../../../../../carlRandomizer/main/QUIZ/stud_info-register.php?error=Some error occurred, please check if all the fields have the right input!");
	exit();
}