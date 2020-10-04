<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$inputFileType = 'Xlsx';
//    $inputFileType = 'Xlsx';
//    $inputFileType = 'Xml';
//    $inputFileType = 'Ods';
//    $inputFileType = 'Slk';
//    $inputFileType = 'Gnumeric';
//    $inputFileType = 'Csv';
$inputFileName = 'helloworld.xlsx';

/**  Create a new Reader of the type defined in $inputFileType  **/
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);
print_r($spreadsheet);