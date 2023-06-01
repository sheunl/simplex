<?php
require_once "../../autoloader.php";
use Database\DBSetup;

class Utils{

    static function config_check($page){
        switch($page){
            case "index.php":
            case "":
                if(file_exists("../../.config")) {
                    echo "'.config' file already exists\n";
                    header('Location: '.'dashboard.php');
                    exit();
                } else{
                    echo "'.config' file already exists\n";
                    header('Location: '.'setup.php');
                    exit();
                }
            break;

            case "setup.php":
                if(file_exists("../../.config")) {
                    echo "'.config' file already exists\n";
                    header('Location: '.'dashboard.php');
                    exit();
                } 
            break;

            case "dashboard.php":
                if(!file_exists("../../.config")) {
                    echo "'.config' file doesnt exists\n";
                    header('Location: '.'setup.php');
                    exit();
                }
            break;

            default:
                header('Location: 404.php');
                exit();
        }
        
    }

    static function config_db(){
        DBSetup::create_DB();
    }

}
