<?php

include '../../../../carlRandomizer/config/dbcon.php';

session_start();
$student_id = $_SESSION['student_id'];
$category = $_SESSION['categoryNumber']; 

// Check if user has already submitted answers for this category
$sql_check = "SELECT * FROM tbl_quiz_scores WHERE student_id = $student_id AND category = $category";
$result_check = mysqli_query($conn, $sql_check);
$num_rows = mysqli_num_rows($result_check);

$total_questions_front = 0;

// Get the total number of questions for this category
$sql = "SELECT COUNT(*) FROM tbl_quiz_questions WHERE category = $category";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$total_questions = $row[0];

$total_questions_front = $total_questions;

if ($num_rows > 0) {
  // User has already submitted answers for this category, retrieve and display previous score
  $row = mysqli_fetch_assoc($result_check);
  $score = $row['score'];
  echo "You have already submitted answers for this category. Your previous score was $score out of $total_questions_front.";
} else {
  // User has not submitted answers for this category, proceed with submitting answers and saving score
  $sql2 = "SELECT COUNT(*) 
        FROM tbl_quiz_answers 
        JOIN tbl_quiz_questions ON tbl_quiz_questions.question_number = tbl_quiz_answers.question_number 
        AND tbl_quiz_questions.category = tbl_quiz_answers.category 
        WHERE tbl_quiz_answers.student_id = $student_id 
        AND tbl_quiz_answers.category = $category 
        AND tbl_quiz_answers.user_answer = tbl_quiz_questions.correct_answer";

  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  $total_correct = $row2[0];

  $score = round(($total_correct / $total_questions) * 100);

  // Save score to database
  $sql_save = "INSERT INTO tbl_quiz_scores (student_id, category, score) VALUES ($student_id, $category, $total_correct)";
  $result_save = mysqli_query($conn, $sql_save);

  if ($result_save) {
    // quiz submitted successfully, retrieve and display the score
    echo "You scored $total_correct out of $total_questions_front which is $score%";
} else {
    echo "Error saving score";
  }
}

mysqli_close($conn);
?>