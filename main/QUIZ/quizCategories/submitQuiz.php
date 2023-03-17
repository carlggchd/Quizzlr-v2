<?php
  include '../../../../carlRandomizer/config/dbcon.php';

  $answers = $_POST['answers'];

// insert the answers into the database
foreach ($answers as $index => $answer) {
  $question_number = $index + 1;
  $sql = "INSERT INTO tbl_quiz_answers (question_number, user_answer) VALUES ($question_number, '$answer')";
  mysqli_query($conn, $sql);
}

// close the database connection
mysqli_close($conn);

// return a success message
echo 'Answers saved!';
?>
