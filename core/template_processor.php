<?php
/* 

Filename: core/template_processor.php

Author: Abdulrasaq Lawani

Purpose: This file is responsible for processing templates in src.

*/

include "parser.php";

$env_variables = array();

function read_file_content($file_path){
    $afile = fopen($file_path, "r") or die("Unable to open file!");
    if(filesize($file_path)<=0){
        _err("Template file ". substr($file_path,strrpos($file_path,"/")+1) ." is empty. Build terminated.");
        exit;
    }
    $text  =fread($afile,filesize($file_path));
    fclose($afile);

    return $text;
}


function copy_recursively($root,$dest){
    $static_directory_source = $root;
    $static_directory_build = $dest;
    $static_files = scandir($static_directory_source);
    unset($static_files[array_search('.',$static_files,true)]);
    unset($static_files[array_search('..',$static_files,true)]);

    foreach($static_files as $afile){
        
        if(is_dir($static_directory_source."/".$afile)) {
            
            copy_recursively($static_directory_source."/".$afile,$static_directory_build ."/".$afile);
        }
        else{
            if (!file_exists($static_directory_build))
                mkdir($static_directory_build,0777,true);
            copy($static_directory_source."/".$afile, $static_directory_build."/".$afile);
        }
    }
}

function delete_recursively($root){
    
    $static_files = scandir($root);
    unset($static_files[array_search('.',$static_files,true)]);
    unset($static_files[array_search('..',$static_files,true)]);

    foreach($static_files as $afile){
        
        if(is_dir($root."/".$afile)) {
            delete_recursively($root."/".$afile);
        }
        else{
            unlink($root."/".$afile);
        }
    }
}

function create_pages($locations=[]){
    $head_location =  $locations["head_location"];
    $foot_location = $locations["foot_location"];
    $body_location = $locations["body_location"];

    $build_location =$locations["build_location"];

    $head_text =  read_file_content($head_location);
    $foot_text = read_file_content($foot_location);

    $page_files = scandir($body_location);
    foreach( $page_files as $file){
        if(substr($file,-5) != ".html"){
            unset($page_files[array_search($file,$page_files,true)]);
            continue;
        }

        $body_text = read_file_content($body_location."/".$file);
        
        $body_text = parse_body($body_text);
        $build_page = $head_text."\n".$body_text."\n".$foot_text;

        $create_page = fopen($build_location."/".$file,"w");
        fwrite($create_page, $build_page);
        fclose($create_page);
    }
}
?>