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

     <?php

 
$sql = "SELECT * FROM tbl_quiz_questions WHERE category = $category ORDER BY question_number ASC";
$result = mysqli_query($conn, $sql);

// Store questions in an array
$questions = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row;
    }
}

// Get the index of the current question from the query parameter
$index = isset($_GET['q']) ? intval($_GET['q']) : 0;

// Load the appropriate quiz question based on the index
echo '<div class="question-container">'; //question-container head
if ($index < count($questions)) { //marker 001 head
    $question = $questions[$index];

    if($index >=1 || $index <=0){
      echo '<h2>Question number: ' . ($index+1) . '</h2>';
    }
echo "<br>";
echo "<p>" . $question['question'] . "</p>";
echo "<div class='choices-container'>"; //choices-container head
echo "<div class='left-column'>"; //left-column head
if (strlen($question['choice_a']) > 20) {
  echo "<label><input type='radio' name='answer' value='a'> A. " . $question['choice_a'] . "</label>";
} else {
  echo "<label class='short-choice'><input type='radio' name='answer' value='a'> A. " . $question['choice_a'] . "</label>";
}
if (strlen($question['choice_b']) > 20) {
  echo "<br><label><input type='radio' name='answer' value='b'> B. " . $question['choice_b'] . "</label> <br>";
} else {
  echo "<br><label class='short-choice'><input type='radio' name='answer' value='b'> B. " . $question['choice_b'] . "</label>";
}
echo "</div>"; //left-column tail
echo "<div class='right-column'>"; //right-column head
if (strlen($question['choice_c']) > 20) {
  echo "<label><input type='radio' name='answer' value='c'> C. " . $question['choice_c'] . "</label>";
} else {
  echo "<label class='short-choice'><input type='radio' name='answer' value='c'> C. " . $question['choice_c'] . "</label>";
}
if (strlen($question['choice_d']) > 20) {
  echo "<br><label><input type='radio' name='answer' value='d'> D. " . $question['choice_d'] . "</label>";
} else {
  echo "<br><label class='short-choice'><input type='radio' name='answer' value='d'> D. " . $question['choice_d'] . "</label>";
}
echo "</div>";//right-column tail
echo "</div>";//choices-container tail

    // Add a "Previous" button that reloads the page with the previous question
    if ($index > 0) {
        echo '<a class="prev-btn" href="?category=' . $category . '&q=' . ($index-1) . '">Previous</a>';
    }

    // Add a "Next" button that reloads the page with the next question
    if ($index < count($questions) - 1) {
        echo '<a class="next-btn" href="?category=' . $category . '&q=' . ($index+1) . '">Next</a>';
    }
    
    //submit button only shows during last question.
    if ($index >= count($questions) - 1) {
    echo '<form action="#" method="POST">
            <input type="hidden" name="category" value="' . $category . '">
            <input type="hidden" name="total_questions" value="' . count($questions) . '">
            <input class="submit-btn" type="submit" name="submit" value="Submit">
          </form>';
    }

    echo '</div>';//question-container tail
    
} // marker 001 tail

?>


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