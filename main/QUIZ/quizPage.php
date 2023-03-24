<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="quizPage.css">
      <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
      <meta http-equiv="Pragma" content="no-cache">
      <meta http-equiv="Expires" content="0">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Quiz</title>
   </head>
   <body>
      <div class="header">
          <h1>QUIZZLR</h1>
          <p>The ultimate quiz randomizer</p>
          <div class="welcome-msg">
            <?php
               session_start();
               include_once '../../../carlRandomizer/config/dbcon.php';
            
               // shows who is the current user
               $student_id = $_SESSION['student_id'];
               if(isset($_SESSION['username'])){
                  echo "Welcome, ".$_SESSION['username']."!";
               }
               
               function showScore($student_id, $category) {
                  include '../../../carlRandomizer/config/dbcon.php';
                  $scoreQuery = "SELECT score FROM tbl_quiz_scores WHERE student_id=$student_id AND category = $category";
                  $scoreResult = mysqli_query($conn, $scoreQuery);
                  $row = mysqli_fetch_assoc($scoreResult);
                  if ($row !== null) {
                      $score = $row['score'];
                      return $score;
                  } else {
                      return 'N/A';
                  }
              }

               // function for checking if user is admin or not
                 function isAdmin($student_id) { 
                  include '../../../carlRandomizer/config/dbcon.php';
                  $result = mysqli_query($conn, "SELECT admin_status FROM tbl_login WHERE student_id = $student_id");
                  $statusCheck = mysqli_fetch_assoc($result);
                  return $statusCheck['admin_status'] == 1;
                }

                function isCategoryAnswered($student_id, $category) {
                  include '../../../carlRandomizer/config/dbcon.php';
                  $query = "SELECT * FROM tbl_quiz_answers WHERE student_id=$student_id AND category=$category";
                  $result = mysqli_query($conn, $query);
                  return (mysqli_num_rows($result) > 0);
               }
                
               //checks if user is registered or not
               $regi_check = mysqli_query($conn, "SELECT * FROM tbl_student_info WHERE student_id='$student_id'");
            ?>
         </div>
   <nav class="navbar"> 
      <ul class="nav-menu"> 
         <li class="nav-item">
         <a href="../../../carlRandomizer/index.php" class="nav-link">Home</a>
         </li>
         <li class="nav-item">
         <a href="../../../carlRandomizer/main//QUIZ/stud_info-register.php" class="nav-link">Register</a>
         </li>
         <li class="nav-item">
         <a href="" class="nav-link">About (under construction)</a>
         </li>
         <li class="nav-item">
         <a href="../../../carlRandomizer/main/LOGIN/logout.php" class="nav-link">Logout</a>
         </li>
      </ul>
      <div class="hamburger">
         <span class="bar"></span>
         <span class="bar"></span>
         <span class="bar"></span>
      </div>
   </nav>
   </div>

<div class="row">

    <div class="card">
         <h2>Quiz Category 1</h2>
         <p>General Knowledge</p>
         <?php
            if (mysqli_num_rows($regi_check) == 0) {
               if (!isAdmin($student_id)) {
                  echo "<p>Please register your information before taking this quiz.</p>";
              } else {
                  echo "<p>Please register your information before UPLOADING to this quiz.</p>";
              }
             } 
            else if(isAdmin($student_id)){
               echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/uploadQuiz.php?category=1'><button>Upload Quiz</button></a>";
            }
            else{
               $answered = isCategoryAnswered($student_id, 1);
               if ($answered) {
                  echo '<button onclick="alert(\'Quiz already answered! Your score is ' . showScore($student_id, 1) .'.\')">Quiz Answered</button>';
               } else {
                   echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/quizStart.php?category=1'><button>Start Quiz</button></a>";
               }
            }
         ?>   
      </div>

      <div class="card">
         <h2>Quiz Category 2</h2>
         <p>Math</p>
         <?php
            if (mysqli_num_rows($regi_check) == 0) {
               if (!isAdmin($student_id)) {
                  echo "<p>Please register your information before taking this quiz.</p>";
              } else {
                  echo "<p>Please register your information before UPLOADING to this quiz.</p>";
              }
             } 
            else if(isAdmin($student_id)){
               echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/uploadQuiz.php?category=2'><button>Upload Quiz</button></a>";
            }
            else{
               $answered = isCategoryAnswered($student_id, 2);
               if ($answered) {
                  echo '<button onclick="alert(\'Quiz already answered! Your score is ' . showScore($student_id, 2) .'.\')">Quiz Answered</button>';
               } else {
                   echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/quizStart.php?category=2'><button>Start Quiz</button></a>";
               }
            }
         ?> 
      </div>

      <div class="card">
         <h2>Quiz Category 3</h2>
         <p>English</p>
         <?php
            if (mysqli_num_rows($regi_check) == 0) {
               if (!isAdmin($student_id)) {
                  echo "<p>Please register your information before taking this quiz.</p>";
              } else {
                  echo "<p>Please register your information before UPLOADING to this quiz.</p>";
              }
             } 
            else if(isAdmin($student_id)){
               echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/uploadQuiz.php?category=3'><button>Upload Quiz</button></a>";
            }
            else{
               $answered = isCategoryAnswered($student_id, 3);
               if ($answered) {
                  echo '<button onclick="alert(\'Quiz already answered! Your score is ' . showScore($student_id, 3) .'.\')">Quiz Answered</button>';
               } else {
                   echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/quizStart.php?category=3'><button>Start Quiz</button></a>";
               }
            }
         ?> 
      </div>

      <div class="card">
         <h2>Quiz Category 4</h2>
         <p>Science</p>
         <?php
            if (mysqli_num_rows($regi_check) == 0) {
               if (!isAdmin($student_id)) {
                  echo "<p>Please register your information before taking this quiz.</p>";
              } else {
                  echo "<p>Please register your information before UPLOADING to this quiz.</p>";
              }
             } 
            else if(isAdmin($student_id)){
               echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/uploadQuiz.php?category=4'><button>Upload Quiz</button></a>";
            }
            else{
               $answered = isCategoryAnswered($student_id, 4);
               if ($answered) {
                  echo '<button onclick="alert(\'Quiz already answered! Your score is ' . showScore($student_id, 4) .'.\')">Quiz Answered</button>';
               } else {
                   echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/quizStart.php?category=4'><button>Start Quiz</button></a>";
               }
            }
         ?> 
      </div>

      <div class="card">
         <h2>Quiz Category 5</h2>
         <p>History</p>
         <?php
            if (mysqli_num_rows($regi_check) == 0) {
               if (!isAdmin($student_id)) {
                  echo "<p>Please register your information before taking this quiz.</p>";
              } else {
                  echo "<p>Please register your information before UPLOADING to this quiz.</p>";
              }
             } 
            else if(isAdmin($student_id)){
               echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/uploadQuiz.php?category=5'><button>Upload Quiz</button></a>";
            }
            else{
               $answered = isCategoryAnswered($student_id, 5);
               if ($answered) {
                  echo '<button onclick="alert(\'Quiz already answered! Your score is ' . showScore($student_id, 5) .'.\')">Quiz Answered</button>';
               } else {
                   echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/quizStart.php?category=5'><button>Start Quiz</button></a>";
               }
            }
         ?> 
      </div>

      <div class="card">
         <h2>Quiz Category 6</h2>
         <p>Social Sciences</p>
         <?php
            if (mysqli_num_rows($regi_check) == 0) {
               if (!isAdmin($student_id)) {
                  echo "<p>Please register your information before taking this quiz.</p>";
              } else {
                  echo "<p>Please register your information before UPLOADING to this quiz.</p>";
              }
             } 
            else if(isAdmin($student_id)){
               echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/uploadQuiz.php?category=6'><button>Upload Quiz</button></a>";
            }
            else{
               $answered = isCategoryAnswered($student_id, 6);
               if ($answered) {
                  echo '<button onclick="alert(\'Quiz already answered! Your score is ' . showScore($student_id, 6) .'.\')">Quiz Answered</button>';
               } else {
                   echo "<a href='../../../carlRandomizer/main/QUIZ/quizCategories/quizStart.php?category=6'><button>Start Quiz</button></a>";
               }
            }
         ?> 
      </div>

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