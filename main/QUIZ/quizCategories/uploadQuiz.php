<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="uploadQuiz.css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz_Upload</title>
</head>
<body>
<header>
        <h1>Quiz Upload</h1>
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
      
       <div class="container">

          <form method="post" action="upload.php" enctype="multipart/form-data">

            <?php $category = $_GET['category']; ?>

            <label for="category">Category:</label>
                <select name="category" id="category">
                  <option value="1" <?php echo ($category == 1) ? 'selected' : '' ?>>General Knowledge</option>
                  <option value="2" <?php echo ($category == 2) ? 'selected' : '' ?>>Math</option>
                  <option value="3" <?php echo ($category == 3) ? 'selected' : '' ?>>English</option>
                  <option value="4" <?php echo ($category == 4) ? 'selected' : '' ?>>Science</option>
                  <option value="5" <?php echo ($category == 5) ? 'selected' : '' ?>>History</option>
                  <option value="6" <?php echo ($category == 6) ? 'selected' : '' ?>>Social Sciences</option>
                </select><br><br>
            <input type="hidden" name="category" value="<?php echo $category; ?>">
            <input type="file" name="file" accept=".csv,.xlsx,.xls"> <br><br>
            <button type="submit">Upload</button>
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