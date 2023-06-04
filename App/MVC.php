<?php
/* 

Filename: MVC.php

Author: Abdulrasaq Lawani

Purpose: Processing of Web Requests through routing, serving templates, web logic etc.

*/

namespace App;

use Database\DBEngine;

class MVC{
    
    static function router($page){
        $config_exists = file_exists("../../.config");
      
        switch($page){
            case "index.php":
            case "":
                header("Location: dashboard.php");
                break;

            case "setup.php":
                if ($_SERVER['REQUEST_METHOD'] === "POST"){
              
                }
                require __DIR__ . '/../Template/setup.php';
                break;

            case "dashboard.php":
                require __DIR__ . '/../Template/dashboard.php';
                break;

            default:
                require __DIR__ . '/../Template/404.php';
                break;
        }
        
    }

}