<?php
session_start(); 
require '../../../../carlRandomizer/vendor/autoload.php';
include '../../../../carlRandomizer/config/dbcon.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_FILES['file'])) { //marker 001
    // Get the uploaded file name and tmp name
    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    // Get the file extension
    $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Create a new PhpSpreadsheet reader instance based on the file extension
    if ($extension == 'xlsx') {
        $reader = IOFactory::createReader('Xlsx');
    } elseif ($extension == 'xls') {
        $reader = IOFactory::createReader('Xls');
    } elseif ($extension == 'csv') {
        $reader = IOFactory::createReader('Csv');
    } else {
        die('Unsupported file format');
    }

    // Read the uploaded file
    $spreadsheet = $reader->load($tmp_name);

    // Get the first worksheet
    $worksheet = $spreadsheet->getActiveSheet();

    // Initialize an empty array to store the data from the worksheet
    $data = array();

    // Iterate through the rows and columns
    foreach ($worksheet->getRowIterator() as $key => $row) {
        if($key == 1) continue; // skip the first row
        $rowData = array();
        foreach ($row->getCellIterator() as $cell) {
            $rowData[] = $cell->getValue();
        }
        $data[] = $rowData;
    }

    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $counter = 0;

    // Insert each row into the tbl_quiz_questions table
    foreach ($data as $row) { //marker 002
        $question_number = mysqli_real_escape_string($conn, $row[0]);
        $question = mysqli_real_escape_string($conn, $row[1]);
        $choice_a = mysqli_real_escape_string($conn, $row[2]);
        $choice_b = mysqli_real_escape_string($conn, $row[3]);
        $choice_c = mysqli_real_escape_string($conn, $row[4]);
        $choice_d = mysqli_real_escape_string($conn, $row[5]);
        $correct_answer = mysqli_real_escape_string($conn, $row[6]);
        $credit_points = mysqli_real_escape_string($conn, $row[7]);
    
        // Check if question number and category already exist
        $check_sql = "SELECT question_number FROM tbl_quiz_questions WHERE question_number = '$question_number' AND category = $category";
        $check_result = mysqli_query($conn, $check_sql);
    
        if (mysqli_num_rows($check_result) > 0) {
            // If question number and category exist, update the existing record
            $update_sql = "UPDATE tbl_quiz_questions SET question = '$question', choice_a = '$choice_a', choice_b = '$choice_b', choice_c = '$choice_c', choice_d = '$choice_d', correct_answer = '$correct_answer', credit_points = '$credit_points' WHERE question_number = '$question_number' AND category = $category";
    
            if (mysqli_query($conn, $update_sql)) {
                $counter++;
                if ($counter >= 30) {
                    echo "<script>alert('Quiz Updated successfully!');</script>";
                }
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            // If question number and category do not exist, insert a new record
            $insert_sql = "INSERT INTO tbl_quiz_questions (question_number, question, choice_a, choice_b, choice_c, choice_d, correct_answer, credit_points, category)
            VALUES ('$question_number', '$question', '$choice_a', '$choice_b', '$choice_c', '$choice_d', '$correct_answer', '$credit_points', $category)";
    
            if (mysqli_query($conn, $insert_sql)) {
                $counter++;
                if ($counter >= 30) {
                    echo "<script>alert('Quiz Uploaded successfully!');</script>";
                }
            } else {
                echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
            }
        }
    } //head on marker 002
    // Close the database connection
    mysqli_close($conn);
}//head on marker 001
?> 