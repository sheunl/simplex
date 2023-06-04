<?php
/* 

Filename: Server.php

Author: Abdulrasaq Lawani

Purpose: Handling running of server.

*/
namespace App;

class Server{

    protected $config_parameters = [];

    static $descriptorspec = array(
        0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
        1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
        2 => array("pipe", "w") // stderr is a file to write to
     );

     static $cwd = 'Template';

    function __construct(){
        
    }

    /**
     * Run server and output logs
     */

    static function run_server(){
        $process = proc_open('php -S 127.0.0.1:9999 index.php', self::$descriptorspec, $pipes, self::$cwd, null);

        while(true){
            echo fgets($pipes[2]);
        }

        fclose($pipes[1]);

        $return_value = proc_close($process);

        return $return_value;
    }

    
}
?>