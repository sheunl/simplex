<?php
/*  
Author: Abdulrasaq Lawani

Purpose:
This file is responsible for running the cli commands for simplex.

*/

if ($argc <= 1){
    echo "Commands:\nbuild - generate static files\nclean - clear build directory\nrebuild - clean directory and regenerate files\n";
    exit();
}

if (!file_exists(".config")){
    echo ".config file not found. Exiting.";
    exit();
}

$config_file_name = ".config";
$config_file = fopen($config_file_name,"r") or die("Unable to open file!");

//Read config file keys and values
$config_parameters = array();
while(!feof($config_file)){
    $hold = fgets($config_file);
    $params = explode(":",$hold);
    if(count($params)==2){
        $config_parameters[$params[0]] =$params[1];
    }
}

fclose($config_file);

//REMOVE THESE ARE FOR DEBUGGING
// var_dump($config_parameters);
// echo "\n". filesize($config_file);
// var_dump($argv);
// var_dump($argc );
//echo fread($config_parameters, filesize($config_file_name));


?>