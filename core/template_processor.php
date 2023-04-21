<?php
/* 

Filename: core/template_processor.php

Author: Abdulrasaq Lawani

Purpose: This file is responsible for processing templates in src.

*/

function get_file_list($root){
    $build_directory = $root."/src";
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

copy_recursively("/home/sheunl/Projects/Simplex/src/static","/home/sheunl/Projects/Simplex/build/static");
?>