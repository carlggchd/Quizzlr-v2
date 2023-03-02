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
        <div class="welcome-msg">
              <?php
              session_start();
              include_once '../../../carlRandomizer/config/dbcon.php';
              if(isset($_SESSION['username'])){
                echo "Welcome, ".$_SESSION['username']."!";
              }
              ?>
          </div>
        <nav class="navbar"> 
          <ul class="nav-menu"> 
            <li class="nav-item">
              <a href="/../../carlRandomizer/index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Register</a>
            </li>
            <li class="nav-item">
              <a href="/../../../carlRandomizer/main/QUIZ/quizPage.php" class="nav-link">Quiz Page</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">About (under construction)</a>
            </li>
            <li class="nav-item">
              <a href="/../../carlRandomizer/main/LOGIN/logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
          <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
        </nav>
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

      <script>
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");

        hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
        })

        document.querySelectorAll(".nav-link").forEach(n => n. 
        addEventListener("click", () => {
          hamburger.classList.remove("active");
          navMenu.classList.remove("active");
        }))
      </script>
     
      <footer>
        <p>&copy; 2023 Quizzlr </p>
      </footer>

</body>

</html>