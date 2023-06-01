<?php
/* 

Filename: Simplex.php

Author: Abdulrasaq Lawani

Purpose: This file is responsible for running all the commands for simplex from both GUI and CLI.

*/
namespace App;

// require_once "../autoloader.php";

use App\SimplexCLI;

class Core{

    private $cli = null;

    function __construct($cli_arg){
        $this->cli = $cli_arg;
    }

    function cli_call(){
        $simplecli = new SimplexCLI($this->cli);
        $simplecli->run();
    }

    function gui_call(){

    }

    function run_server(){
        
    }
}


?>