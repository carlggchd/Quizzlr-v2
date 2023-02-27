<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="activateAccount.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account-Activation</title>
</head>
<body>


    <header>
        <h1>Student Registration Form</h1>
      </header>
      
       <div class="container">

        <form action="../../../carlRandomizer/main/LOGIN//signup-check.php" method="post">
     	
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error-msg"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>User Name:</label>
          <?php if (isset($_GET['username'])) { ?>
               <input type="text" 
                      name="username" 
                      placeholder="User Name"
                      value="<?php echo $_GET['username']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="username" 
                      placeholder="Enter Username"><br>
          <?php }?>


     	<label>Password:</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Enter Password"><br>

          <label>Confirm Password:</label>
          <input type="password" 
                 name="con_password" 
                 placeholder="Confirm password"><br>

     	<button type="submit">Sign Up</button>
        <br>  <a href="../../../carlRandomizer/main/LOGIN/loginPage.php" class="ca">Already have an account?</a>
     </form>





        
      </div>
     

      <footer>
        <p>&copy; 2023 Quizzlr </p>
      </footer>
</body>
</html>