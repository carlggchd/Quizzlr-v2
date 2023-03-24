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

  <div class="btns-container" id="btns-container">
    
    <div class="start-btn" id="start-quiz-div"> <button id="start-quiz-btn">Start Quiz</button> </div>
  </div>


  <?php
  include '../../../../carlRandomizer/config/dbcon.php';

  $getCategory = $_SESSION['categoryNumber'];

  $sql = "SELECT * FROM tbl_quiz_questions WHERE category = $getCategory ORDER BY question_number ASC";
  $result = mysqli_query($conn, $sql);

  $questions = array();
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $questions[] = $row;
    }
  } else {
    echo "<br><center>NO QUIZ UPLOADED in " . strtoupper($category_name) . " ! </center>" ;
    echo "<style>#btns-container {display: none;}</style>";
  }

  $html = '';
  $tempAnswers = array();
  foreach ($questions as $index => $question) {
    $html .= '<div class="question-container" id="question-container" style="' . ($index == 0 ? 'display: block;' : 'display: none;') . '">';
        $html .= '<div class="question">';
            $html .= '<h3>Question #: ' . $question['question_number'] . '</h3>';
            $html .= '<p>' . $question['question'] . '</p>';
            $html .= '<div class="choices-container">';
              $html .= '<ul>';
                $html .= '<div class="left-column">';
                  $html .= '<li><input type="radio" id="answer_' . $question['question_number'] . '_a" name="answer_' . $question['question_number'] . '" value="A"> <label for="answer_' . $question['question_number'] . '_a">A. ' . $question['choice_a'] . '</label></li>';
                  $html .= '<li><input type="radio" id="answer_' . $question['question_number'] . '_b" name="answer_' . $question['question_number'] . '" value="B"> <label for="answer_' . $question['question_number'] . '_b">B. ' . $question['choice_b'] . '</label></li>';
                $html .= '</div>';
                $html .= '<div class="right-column">';
                  $html .= '<li><input type="radio" id="answer_' . $question['question_number'] . '_c" name="answer_' . $question['question_number'] . '" value="C"> <label for="answer_' . $question['question_number'] . '_c">C. ' . $question['choice_c'] . '</label></li>';
                  $html .= '<li><input type="radio" id="answer_' . $question['question_number'] . '_d" name="answer_' . $question['question_number'] . '" value="D"> <label for="answer_' . $question['question_number'] . '_d">D. ' . $question['choice_d'] . '</label></li>';
                $html .= '</div>';
              $html .= '</ul>';
            $html .= '</div>';
        $html .= '</div>';
    $html .= '</div>';

    array_push($tempAnswers, "answer_" . $question['question_number']);

  }

  $html .= '<button class="prev-btn" style="display: none;">Previous</button>';
  $html .= '<button class="next-btn">Next</button>';
  $html .= '<button class="submit-btn" style="display: none;">Submit</button>';
  echo $html;
?>


  <script>
   //jquery for navigation buttons
   $(document).ready(function() {
      $('#question-container').hide();
      $('.next-btn').hide();
     
      $('#start-quiz-btn').click( function() {
        $('#question-container').show();
        $('#start-quiz-div').hide();
        $('.next-btn').show();
      });
      var questionCounter = 2;
      $(".next-btn").click(function() {
      var currentQuestionContainer = $(".question-container:visible");
      
      currentQuestionContainer.hide();
      currentQuestionContainer.next().show();
        
      $(".prev-btn").show();
      if (currentQuestionContainer.next().length == 0 || questionCounter ==30) {
        $(".next-btn").hide();
        $(".submit-btn").show(); 
      }
        questionCounter++;
    });

    $(".prev-btn").click(function() {
      var currentQuestionContainer = $(".question-container:visible");
      currentQuestionContainer.hide();
      currentQuestionContainer.prev().show();
      
      $(".next-btn").show();
      if (currentQuestionContainer.prev().length == 0 || questionCounter <=3) {
        $(".prev-btn").hide();
        $(".next-btn").show();
      }
      else if (questionCounter <=31){
          $(".submit-btn").hide(); 
          $(".next-btn").show();
          $(".prev-btn").show();
        }
      questionCounter--;
    });


  var answers = [];
$("input[type='radio']").click(function() {
  var answer = $(this).val(); // get the selected answer
  var index = $.inArray($(this).attr("name"), <?php echo json_encode($tempAnswers); ?>);
  if (index >= 0) {
    answers[index] = answer; // update the array with the user's answer
  }
  console.log("user answer: "+answer);
  console.log("question num: "+(index+1));
});

// event listener for submit button
$(".submit-btn").click(function() {
  // check if all questions have been answered
  var all_answered = true;
  var unanswered_questions = [];
  for (var i = 0; i < <?php echo count($tempAnswers); ?>; i++) {
    if (!answers[i]) {
      all_answered = false;
      unanswered_questions.push(i+1);
      // break;
    }
  }

  if (!all_answered) {
    alert("Please answer all questions before submitting.\nUnanswered questions: " + unanswered_questions.join(", "));
  } else {
    if (confirm('Are you sure you want to submit the quiz?')) {
    // make an AJAX call to the server
    $.ajax({
      url: 'submitQuiz.php',
      type: 'POST',
      data: {answers: answers},
      success: function(response) {
      if (response.trim() === 'Answers saved!') {
      // quiz submitted successfully, retrieve and display the score
      $.ajax({
      url: 'getScore.php',
      type: 'POST',
      data: {category: <?php echo $getCategory; ?>},
      success: function(score) {
      alert('Answers saved to database!');
      alert(score);
      },
      error: function(xhr, status, error) {
      console.log(xhr.responseText);
      alert('Error getting score');
      }
      });
      } else {
      // display a message indicating that answers have already been submitted for this category

          // retrieve and display the previous score
          $.ajax({
            url: 'getScore.php',
            type: 'POST',
            data: {category: <?php echo $getCategory; ?>},
            success: function(score) {
              alert(score);
              alert("You will be redirected to the quiz page!");
              window.location.replace("../../../../carlRandomizer/main/QUIZ/quizPage.php");
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
              alert('Error getting score');
            }
          });
      }
      },
      error: function(xhr, status, error) {
      console.log(xhr.responseText);
      alert('Error saving answers');
      }
    });
      }
      }

    });
  
   });

  </script>

  <script>
    // hamburger menu head
  $(document).ready(function(){
  $(".hamburger").click(function(){
    $(this).toggleClass("active");
    $(".nav-menu").toggleClass("active");
  });
  
  $(".nav-link").click(function(){
    $(".hamburger").removeClass("active");
    $(".nav-menu").removeClass("active");
  });
});
 // hamburger menu tail
  </script>

  <footer>
    <p>&copy; 2023 Quizzlr </p>
  </footer>

</body>

</html>