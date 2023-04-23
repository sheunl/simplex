<?php
/*

Filename: tests/custom_tests/test_template_processor.php

Author: Abdulrasaq Lawani

Purpose: Testing template processor.

*/

include "core/template_processor.php";

$test_src_directories = array(
    "body" => "src/pages/body",
    "templates"=> "src/pages/templates",
    "images" => "src/static/images",
    "scripts" => "src/static/scripts",
    "style" => "src/static/stylesheets"
);

$test_build_directories = array(
    "head_location" => getcwd()."/test_src/pages/templates/head.html",
    "foot_location" => getcwd()."/test_src/pages/templates/foot.html",
    "body_location" => getcwd()."/test_src/pages/body",
    "build_location" => getcwd()."/test_build"
);

function preparing_template_processor_tests(){
    echo __FUNCTION__."\n";
    if(!file_exists("test_src")){
        echo "Test source directory missing. Test incomplete. Exiting Test.\n";
        exit();
    }
}

function testing_create_pages(){
    echo __FUNCTION__."\n";
    global $test_build_directories;
    create_pages($test_build_directories);

    return true;
}

function testing_copy_recursively(){
    
}

function testing_read_file_content(){
    
}




function testing_template_processor(){
    echo __FUNCTION__."\n";
    $pass=false;

    $pass=testing_create_pages();
    // $pass=testing_parser_for_images();
    // $pass=testing_parser_for_links();

    return $pass;
}


?>