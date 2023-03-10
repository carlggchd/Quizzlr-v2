<?php
include '../../../../carlRandomizer/config/dbcon.php';
session_start();

$getCategory = $_SESSION['categoryNumber'];

$questionNewCount = $_POST['questionNewCount'];

$sql = "SELECT * FROM tbl_quiz_questions WHERE category = $getCategory ORDER BY question_number ASC LIMIT $questionNewCount ";
$result = mysqli_query($conn, $sql);


$questions = array();
$question_number = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        /*$row['question_number'] = $question_number; 
        $questions[] = $row;
        $question_number++;*/
        echo "<p> ";
        echo "Question # : " . $row['question_number'];
        echo "<br>";
        echo $row['question'];
        echo "</p>";
    }
} else {
    echo "reached maximum questions!";
}

/*$current_question_number = $question_number; 
$current_question_index = $current_question_number -1 ;
$current_question = $questions[$current_question_index];*/



?>
