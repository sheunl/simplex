<?php
/* 

Filename: simplex.php

Author: Abdulrasaq Lawani

Purpose: This file is responsible for running the cli commands for simplex.

*/

$simplex_options = ["start","build","clean","rebuild"];
$command = $argv[1];
$config_file_name = ".config";

//src directories
$src_directories = array(
"body" => "src/pages/body",
"templates"=> "src/pages/templates",
"images" => "src/static/images",
"scripts" => "src/static/scripts",
"style" => "src/static/stylesheets");

$foot_name = "foot.html";
$head_name = "head.html";

if ($argc !== 2 || !in_array($command,$simplex_options)){
    echo "Commands:\nbuild - generate static files\nclean - clear build directory\nrebuild - clean directory and regenerate files\n";
    exit();
}

/* Check, read config file and make src structure */
if($command === "start"){

    if(file_exists(".config")) 
    {
        echo "'.config' file already exists\n";
        exit();
    }

    $config_file = fopen($config_file_name,"w") or die("Unable to open file!");
    fwrite($config_file,"ROOT:".getcwd()."\n");
    fclose($config_file);

    /*Create base files and folders */
    foreach ($src_directories as $src_key=>$src_val){
        if (file_exists($src_val)) continue;
        if (!mkdir($src_val,0777,true)) die("Error Making Directories");
    }

    $head_file = fopen($src_directories["templates"]."/".$head_name,"w") or die("Unable to open file!");

    $hcontent = "<!DOCTYPE html>
    \r<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    </head>
    <body>\n";
    fwrite($head_file,$hcontent);
    fclose($head_file);

    $foot_file = fopen($src_directories["templates"]."/".$foot_name,"w") or die("Unable to open file!");
    
    $fcontent = "</body>
    \r</html>\n";
    fwrite($foot_file,$fcontent);
    fclose($foot_file);


}

if (!file_exists(".config")){
    echo "'.config' file not found. Run 'simplex start'.\n";
    exit();
}


$config_file = fopen($config_file_name,"r") or die("Unable to open file!");

//Read config file keys and values
$config_parameters = array();
while(!feof($config_file)){
    $hold = fgets($config_file);
    $params = explode(":",$hold);
    if(count($params)==2){
        $config_parameters[trim($params[0])] =trim($params[1]);
    }
}

fclose($config_file);

/*************************/

/* build file */


//REMOVE THESE ARE FOR DEBUGGING
 var_dump($config_parameters);
// echo "\n". filesize($config_file);
// var_dump($argv);
// var_dump($argc );
//echo fread($config_parameters, filesize($config_file_name));


?>