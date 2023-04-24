<?php
/*
Filename: tests/custom_tests/test_all.php

Author: Abdulrasaq Lawani

Purpose: To run all tests.

*/

include "tests/custom_tests/test_parser.php";

$count_test =false;
$count_test = testing_parser();

if($count_test){
    echo "\n\n";
    echo "All tests passed\n";
}

?>