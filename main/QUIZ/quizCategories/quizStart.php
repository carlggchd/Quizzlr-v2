<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="quizStyles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz_Start</title>
</head>
<body>
<?php
// Retrieve the category parameter from the URL
$category = $_GET['category'];

// Load the appropriate quiz questions based on the category
if ($category == 1) {
    echo "<h1> GENERAL KNOWLEDGE </h1>";
  // Load questions for category 1
} else if ($category == 2) {
    echo "<h1> MATH </h1>";
  // Load questions for category 2
} else if ($category == 3) {
    echo "<h1> ENGLISH </h1>";
  // Load questions for category 3
} else if ($category == 4) {
    echo "<h1> SCIENCE </h1>";
  // Load questions for category 4
} else if ($category == 5) {
    echo "<h1> HISTORY </h1>";
  // Load questions for category 5
} else if ($category == 6) {
    echo "<h1> SOCIAL SCIENCES </h1>";
  // Load questions for category 6
}
?>
</body>
</html>