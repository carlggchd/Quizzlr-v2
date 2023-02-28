<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="quizPage.css">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Quiz</title>
   </head>
   <body>
      <div class="header">
          <h1>QUIZZLR</h1>
          <p>The ultimate quiz randomizer</p>
        <nav class="navbar"> 
          <!--<a href="#" class="nav-branding">Quizzlr</a> -->
          <ul class="nav-menu"> 
            <li class="nav-item">
              <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="../../../carlRandomizer/main//QUIZ/stud_info-register.php" class="nav-link">Register</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">About</a>
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
            <p>Description for quiz category 1</p>
            <a href="../../../carlRandomizer/main/QUIZ/quizCategories/quizCategory1.php"><button>Start Quiz</button></a>
         </div>
         <div class="card">
            <h2>Quiz Category 2</h2>
            <p>Description for quiz category 2</p>
            <button>Start Quiz</button>
         </div>
         <div class="card">
            <h2>Quiz Category 3</h2>
            <p>Description for quiz category 3</p>
            <button>Start Quiz</button>
         </div>
         <div class="card">
            <h2>Quiz Category 4</h2>
            <p>Description for quiz category 4</p>
            <button>Start Quiz</button>
         </div>
         <div class="card">
            <h2>Quiz Category 5</h2>
            <p>Description for quiz category 5</p>
            <button>Start Quiz</button>
         </div>
         <div class="card">
            <h2>Quiz Category 6</h2>
            <p>Description for quiz category 6</p>
            <button>Start Quiz</button>
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
   </body>
</html>