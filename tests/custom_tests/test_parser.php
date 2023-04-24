<?php
/*

Filename: tests/custom_tests/test_parser.php

Author: Abdulrasaq Lawani

Purpose: Testing template parser

*/

include "core/parser.php";

function testing_parser_for_scripts(){
    echo __FUNCTION__."...\n";

    $in = ["{{#script | jam.lamb.js}}","{{#script_r |https://code.jquery.com/jquery-3.6.4.slim.js}}"];
    $out = ["<script src='static/scripts/jam/lamb.js'></script>","<script src='https://code.jquery.com/jquery-3.6.4.slim.js'></script>"];

    for($i=0;$i<count($in);$i++){
        if(parse_body($in[$i])!==$out[$i]){
            echo __FUNCTION__." failed!\n";
            echo $out[$i]."\n";
            echo parse_body($in[$i])."\n";
            return false;
        }
    }

    echo __FUNCTION__."->Passed!\n";
    return true;
}

function testing_parser_for_images(){
    echo __FUNCTION__."...\n";

    $in = ["{{#image | man.jpeg | 40}}","{{#image | mantle.jpeg}}","{{#image_r | https://laravel.com/img/logotype.min.svg}}"];
    $out = ["<img src='static/images/man.jpeg' width=40px>","<img src='static/images/mantle.jpeg' >","<img src='https://laravel.com/img/logotype.min.svg' >"];

    for($i=0;$i<count($in);$i++){
        if(parse_body($in[$i])!==$out[$i]){
            echo __FUNCTION__." failed!\n";
            echo $out[$i]."\n";
            echo parse_body($in[$i])."\n";
            return false;
        }
    }

    echo __FUNCTION__."->Passed!\n";
    return true;
}

function testing_parser_for_links(){
    echo __FUNCTION__."...\n";

    $in = ["{{@jam | man}}"];
    $out = ["<a href='jam.html'>man</a>"];

    for($i=0;$i<count($in);$i++){
        if(parse_body($in[$i])!==$out[$i]){
            echo __FUNCTION__." failed!\n";
            echo $out[$i]."\n";
            echo parse_body($in[$i])."\n";
            return false;
        }
    }

    echo __FUNCTION__."->Passed!\n";
    return true;
}

function testing_parser(){
    echo __FUNCTION__."\n";
    $pass=false;

    $pass=testing_parser_for_scripts();
    $pass=testing_parser_for_images();
    $pass=testing_parser_for_links();

    return $pass;
}

?>