<?php
include '../../../../carlRandomizer/config/dbcon.php';

session_start();
$student_id = $_SESSION['student_id'];
$getCategory = $_SESSION['categoryNumber']; 

// check if the user has already submitted answers
$sql = "SELECT * FROM tbl_quiz_answers WHERE student_id = $student_id AND category = $getCategory";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // user has already submitted answers, display an error message
  echo 'Error: Answers already submitted for this user!';
} else {
  // user hasn't submitted answers yet, insert the answers into the database
  $answers = $_POST['answers'];

  foreach ($answers as $index => $answer) {
    $question_number = $index + 1;
    $sql = "INSERT INTO tbl_quiz_answers (question_number, user_answer, category, student_id) VALUES ($question_number, '$answer', $getCategory, $student_id)";
    mysqli_query($conn, $sql);
  }

  echo 'Answers saved!';
}

mysqli_close($conn);

?>
