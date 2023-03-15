<?php
  include '../../../../carlRandomizer/config/dbcon.php';
  session_start();

  $getCategory = $_SESSION['categoryNumber'];

  $sql = "SELECT * FROM tbl_quiz_questions WHERE category = $getCategory ORDER BY question_number ASC";
  $result = mysqli_query($conn, $sql);

  $questions = array();
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $questions[] = $row;
    }
  } else {
    echo "reached maximum questions!";
  }

  $html = '';
  foreach ($questions as $index => $question) {
    $html .= '<div class="question-container" style="' . ($index == 0 ? 'display: block;' : 'display: none;') . '">';
        $html .= '<div class="question">';
            $html .= '<h3>Question #: ' . $question['question_number'] . '</h3>';
            $html .= '<p>' . $question['question'] . '</p>';
            $html .= '<div class="choices-container">';
              $html .= '<ul>';
                $html .= '<div class="left-column">';
                  $html .= '<li><input type="radio" name="answer_' . $question['question_number'] . '" value="A"> ' . $question['choice_a'] . '</li>';
                  $html .= '<li><input type="radio" name="answer_' . $question['question_number'] . '" value="B"> ' . $question['choice_b'] . '</li>';
                $html .= '</div>';
                $html .= '<div class="right-column">';
                  $html .= '<li><input type="radio" name="answer_' . $question['question_number'] . '" value="C"> ' . $question['choice_c'] . '</li>';
                  $html .= '<li><input type="radio" name="answer_' . $question['question_number'] . '" value="D"> ' . $question['choice_d'] . '</li>';
                $html .= '</div>';
              $html .= '</ul>';
            $html .= '</div>';
        $html .= '</div>';
    $html .= '</div>';
  }

  $html .= '<button class="prev-btn" style="display: none;">Previous</button>';
  $html .= '<button class="next-btn">Next</button>';
  $html .= '<script>
    $(".next-btn").click(function() {
      var currentQuestionContainer = $(".question-container:visible");
      currentQuestionContainer.hide();
      currentQuestionContainer.next().show();
      
      $(".prev-btn").show();
      if (currentQuestionContainer.next().length == 0) {
        $(".next-btn").hide();
      }
    });

    $(".prev-btn").click(function() {
      var currentQuestionContainer = $(".question-container:visible");
      currentQuestionContainer.hide();
      currentQuestionContainer.prev().show();
      
      $(".next-btn").show();
      if (currentQuestionContainer.prev().length == 0) {
        $(".prev-btn").hide();
      }
    });
  </script>';

  echo $html;
?>