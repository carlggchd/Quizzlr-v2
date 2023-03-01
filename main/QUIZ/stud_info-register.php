<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="stud-register.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account-Activation</title>
</head>
<body>


    <header>
        <h1>Student Information Form</h1>
      </header>
      
       <div class="container">

          <form action="../QUIZ/stud_info-check.php" method="post">
               
               <?php if (isset($_GET['error'])) { ?>
                    <p class="error-msg"><?php echo $_GET['error']; ?></p>
               <?php } ?>

               <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
               <?php } ?>

               <label>First Name:</label>
               <input type="text" name="firstName" placeholder="First Name"> <br>

               <label>Middle Name:</label>
               <input type="text" name="middleName" placeholder="Middle Name"> <br>

               <label>Last Name:</label>
               <input type="text" name="lastName" placeholder="Last Name"> <br>

               <label>Email:</label>
               <?php if (isset($_GET['email'])) { ?>
               <input type="text" name="email"  placeholder="Enter your Email" value="<?php echo $_GET['email']; ?>"><br>
               <?php }
               else{ ?>
               <input type="text" name="email" placeholder="Enter Email"><br>
               <?php }?>

               <label>Phone number:</label>
               <input type="tel" name="phone" placeholder="Enter Phone number"> <br>

               <label>Date of Birth:</label>
               <input type="date" name="dateofBirth" placeholder="Enter Birthday"> <br> <br>

               <label>Address:</label>
               <textarea name="address" placeholder="Enter Address"></textarea><br>

               <label>Gender:</label>
               <select name="gender" id="gender">
                    <option value="" disabled selected>Select a choice</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
               </select>


               <button type="submit">Submit</button>

          </form>

      </div>
     
      <footer>
        <p>&copy; 2023 Quizzlr </p>
      </footer>

</body>

</html>