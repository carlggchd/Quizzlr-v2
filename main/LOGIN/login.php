<?php 
session_start(); 
include '../../../carlRandomizer/config/dbcon.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);

	if (empty($username)) {
		header("Location: ../../../../../carlRandomizer/main/LOGIN/loginPage.php?error=Username is required!");
	    exit();
	}else if(empty($password)){
        header("Location: ../../../../../carlRandomizer/main/LOGIN/loginPage.php?error=Password is required!");
	    exit();
	}else{
		// hashing the password
        $password = md5($password);

        
		$sql = "SELECT * FROM tbl_login WHERE username='$username' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['student_id'] = $row['student_id'];
                echo "<script>alert('Logged in successfully!');</script>";
                echo "<script>window.location = '../../../../../carlRandomizer/main/QUIZ/quizPage.php';</script>";
            	//header("Location: ../../../../../carlRandomizer/main/QUIZ/quizPage.php");
		        exit();
            }else{
				header("Location: ../../../../../carlRandomizer/main/LOGIN/loginPage.php?error=Incorrect Username or password");
		        exit();
                
			}
		}else{
			header("Location: ../../../../../carlRandomizer/main/LOGIN/loginPage.php?error=Incorrect Username or password");
	        exit();
		}
	}
	
}
else{
	header("Location: ../../../../../carlRandomizer/main/LOGIN/loginPage.php?error=SOME ERROR OCCURRED!!");
	exit();
}
