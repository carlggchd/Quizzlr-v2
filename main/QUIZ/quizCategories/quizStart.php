<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="quizStart.css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz_Start</title>
</head>
<body>
 <?php 
    $category = $_GET['category'];
    $category_text = [
        1 => 'General Knowledge',
        2 => 'Math',
        3 => 'English',
        4 => 'Science',
        5 => 'History',
        6 => 'Social Sciences'
    ];
    $category_name = $category_text[$category];
   
 ?>
<header>
        <?php echo"<h1>$category_name</h1>" ?>
        <div class="welcome-msg">
              <?php
              session_start();
              include_once '../../../../carlRandomizer/config/dbcon.php';
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
<?php
// Retrieve the category parameter from the URL


/* Load the appropriate quiz questions based on the category
if ($category == 1) {
    echo "<h1> GENERAL KNOWLEDGE </h1>";
  // Load questions for category 1
} else if ($category == 2) {
    echo "<h1> MATH </h1>";
  // Load questions for category 2
} else if ($category == 3) {
    echo "<h1> ENGLISH </h1>";
  // Load questions for category 3
} else if ($category == 4) {
    echo "<h1> SCIENCE </h1>";
  // Load questions for category 4
} else if ($category == 5) {
    echo "<h1> HISTORY </h1>";
  // Load questions for category 5
} else if ($category == 6) {
    echo "<h1> SOCIAL SCIENCES </h1>";
  // Load questions for category 6
}*/

?>
</body>
</html>