<?php

function get_file_list($root){
    $build_directory = $root."/src";
}

function copy_static($root){
    $static_directory_source = $root."/src/static";
    $static_directory_build = $root."/build";
    $static_files = scandir($static_directory_source);
    for ($i=2;$i<count($static_files);$i++){
        copy($static_directory_source."/".$static_files[$i], $static_directory_build."/".$static_files[$i]);
    }
}

// get_file_list();
copy_static("/home/sheunl/Projects/Simplex")
?>