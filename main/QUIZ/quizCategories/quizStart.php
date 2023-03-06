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
    include '../../../../carlRandomizer/main/QUIZ/quizCategories/upload.php';
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

              <h2>Question #[ ] </h2>
              <br><br><br><br>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente asperiores 
              necessitatibus explicabo est eius mollitia impedit consectetur quisquam cumque atque? 
              Vero dolorum sit sequi reiciendis nemo neque dolor, alias sint!</p>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente asperiores 
              necessitatibus explicabo est eius mollitia impedit consectetur quisquam cumque atque? 
              Vero dolorum sit sequi reiciendis nemo neque dolor, alias sint!</p>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente asperiores 
              necessitatibus explicabo est eius mollitia impedit consectetur quisquam cumque atque? 
              Vero dolorum sit sequi reiciendis nemo neque dolor, alias sint!</p>
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

/* Load the appropriate quiz questions based on the category
if ($category == 1) {
  // Load questions for category 1
} else if ($category == 2) {
  // Load questions for category 2
} else if ($category == 3) {
  // Load questions for category 3
} else if ($category == 4) {
  // Load questions for category 4
} else if ($category == 5) {
  // Load questions for category 5
} else if ($category == 6) {
  // Load questions for category 6
}*/

?>
</body>
</html>