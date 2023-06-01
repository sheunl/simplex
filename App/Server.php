<?php
/* 

Filename: Simplex.php

Author: Abdulrasaq Lawani

Purpose: This file is responsible for running all the commands for simplex from both GUI and CLI.

*/
namespace App;


class Server{

    static $descriptorspec = array(
        0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
        1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
        2 => array("pipe", "w") // stderr is a file to write to
     );

     static $cwd = 'Template/pages';

    function __construct(){
        
    }


    static function run_server(){
        $process = proc_open('php -S 127.0.0.1:9999', self::$descriptorspec, $pipes, self::$cwd, null);

        while(true){
            echo fgets($pipes[2]);
        }

        fclose($pipes[1]);

        $return_value = proc_close($process);

        return $return_value;
    }


}


?>