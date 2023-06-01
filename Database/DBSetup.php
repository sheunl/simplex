<?php
/* 

Filename: simplex.php

Author: Abdulrasaq Lawani

Purpose: This file is responsible for running the cli commands for simplex.

*/

namespace Database;

use PDO;
use App\Simplex;

class DBSetup {

    static function create_DB(){
        $pdo = new PDO("sqlite:eee");
        echo "Hey!Hello!!";
    }


}