<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="quizStart.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
  session_start();
  include '../../../../carlRandomizer/config/dbcon.php';


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

  $_SESSION['categoryNumber'] = $category;
  ?>
  <header>
    <?php echo "<h1>$category_name</h1>" ?>
    <div class="welcome-msg">
      <?php
      if (isset($_SESSION['username'])) {
        echo "Welcome, " . $_SESSION['username'] . "!";
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

  <div class="question-container" id="question-container">

    <?php
    $getCategory = $_SESSION['categoryNumber'];

    $sql = "SELECT * FROM tbl_quiz_questions WHERE category = $getCategory ORDER BY question_number ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    $questions = array();
    $question_number = 0;
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        //$row['question_number'] = $question_number; 
        //$questions[] = $row;
        //$question_number++;
        echo "<p> ";
        echo "Question # : " . $row['question_number'];
        echo "<br>";
        echo $row['question'];
        echo "</p>";
      }
    } else {
      echo "reached maximum questions!";
    }
    ?>
  </div>

  <div class="start-container" id="start-container">

    <div class="start-btn" id="start-btn"> <button id="hide-quiz-btn">Previous</button> </div>
    <div class="start-btn" id="start-btn"> <button id="show-quiz-btn">Next</button> </div>
  </div>

  <script>
    //jquery
    $(document).ready(function() {
      var questionCurrentCount = 1;
      var questionMaxCount = 30; // set this to the maximum number of questions
      $('#show-quiz-btn').click(function() {
        if (questionCurrentCount <= questionMaxCount) {
          $("#question-container").load("getQuestion.php", {
            questionNewCount: questionCurrentCount
          });
          questionCurrentCount++;
        }
      });
      $('#hide-quiz-btn').click(function() {
        if (questionCurrentCount > 1) {
          questionCurrentCount--;
          $("#question-container").load("getQuestion.php", {
            questionNewCount: questionCurrentCount
          });
        }
      });
    });
  </script>

  <script>
    // hamburger menu head
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      navMenu.classList.toggle("active");
    })

    document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () => {
      hamburger.classList.remove("active");
      navMenu.classList.remove("active");
    })) // hamburger menu tail
  </script>

  <footer>
    <p>&copy; 2023 Quizzlr </p>
  </footer>

</body>

</html>