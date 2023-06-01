<?php
/* 

Filename: Simplex.php

Author: Abdulrasaq Lawani

Purpose: This file is responsible for running all the commands for simplex from both GUI and CLI.

*/
namespace App;

require_once "autoloader.php";





class SimplexCLI extends Simplex {
    
    function __construct(string $command)
    {
        parent::__construct($command);
    }
}


?>