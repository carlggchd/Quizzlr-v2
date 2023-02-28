<p class="error-msg"><?php echo $_GET['error']; ?></p>

<?php 
session_start(); 
include "../../../carlRandomizer/config/dbcon.php";

if (isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['con_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
	$re_pass = validate($_POST['con_password']);

	$user_data = 'username='. $username;


	if (empty($username)) {
		header("Location: ../../../../../carlRandomizer/main/LOGIN/activateAccount.php?error=User Name is required&$user_data");
	    exit();
    }else if (strpos($username, ' ') !== false) {
        header("Location: ../../../../../carlRandomizer/main/LOGIN/activateAccount.php?error=Username cannot contain spaces&$user_data");
	    exit();
	}else if(empty($password)){
        header("Location: ../../../../../carlRandomizer/main/LOGIN/activateAccount.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: ../../../../../carlRandomizer/main/LOGIN/activateAccount.php?error=Confirm Password is required&$user_data");
	    exit();
	}

	else if($password !== $re_pass){
        header("Location: ../../../../../carlRandomizer/main/LOGIN/activateAccount.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $password = md5($password);

	    $sql = "SELECT * FROM tbl_login WHERE username='$username' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../../../../../carlRandomizer/main/LOGIN/activateAccount.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO tbl_login(username, password) VALUES('$username', '$password')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: ../../../../../carlRandomizer/main/LOGIN/activateAccount.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: ../../../../../carlRandomizer/main/LOGIN/activateAccount.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: ../../../../../carlRandomizer/main/LOGIN/activateAccount.php?error=some error occurred");
	exit();
}