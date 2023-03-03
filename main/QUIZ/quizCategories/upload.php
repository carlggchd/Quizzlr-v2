<?php
session_start(); 
require '../../../../carlRandomizer/vendor/autoload.php';
include '../../../../carlRandomizer/config/dbcon.php';

use PhpOffice\PhpSpreadsheet\IOFactory;


if (isset($_FILES['file'])) {
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

    // Iterate through the rows and columns
    foreach ($worksheet->getRowIterator() as $row) {
        foreach ($row->getCellIterator() as $cell) {
            echo $cell->getValue() . "\t";
        }
        echo "<br>";
    }
}








?>


