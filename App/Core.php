<?php
/* 

Filename: Core.php

Author: Abdulrasaq Lawani

Purpose: This class holds the core functions for both CLI and Server. This is the 'core' of SimplexCMS.

*/
namespace App;

use App\Server;
use Database\DBEngine;

class Core{

    private $key = null;
    private static $config_parameters = [];
    const config_file_name = ".config";

    /**
     * Allowed CLI commands
     */

    protected array $all_options = [  "start"=> 100,
                                "build" => 200,
                                "clean" => 300,
                                "rebuild" => 400,
                                "migrate" => 500,
                            ];
    
    


    function __construct($command){
        $this->key = array_key_exists($command,$this->all_options) ? $this->all_options[$command] : null;

        if ($this->key == "") self::help_text(true);
    }
    
    /**
     * Function called when running a cli command
     */
    function cli_call(){
        $this->run();
    }

    /**
     * Function called when running a web page command
     */
    function gui_call(){

    }

    /**
     * Function eventually called running all command
     */
    function run(){
        $this->calls($this->key);
    }

    /**
     * Selection and processing of each command 
     */

    function calls($command_key){

        switch ($command_key){
            case 100:
                $this->start_app();
            break;

            case 200:
                self::check_db();
            break;

            case 300:
                self::check_db();
            break;

            case 400:
                self::check_db();
            break;
            
            case 500:
                if(file_exists(self::get_config("DB")) && filesize(self::get_config("DB")) != 0){
                    echo "DB already exists\n";
                    exit();
                }
                else {
                    echo "generating db ...\n";
                    DBEngine::create_DB();
                }
            break;

            default:
            break;

        }
    }

    /**
     * Validate config file and db then calls the Server through the Server class
     */
    function start_app(){
        
        self::config_check();
        self::check_db();

        Server::run_server();
    }

    /**
     * Reads the parameters and values in the config file
     */
    private static function read_config(){

        $config_file = fopen(self::config_file_name,"r") or die("Unable to open file!");

        /*** Read config file keys and values **/
        while(!feof($config_file))
        {
            $hold = fgets($config_file);
            $params = explode(":",$hold);
            if(count($params)==2){
                self::$config_parameters[trim($params[0])] = trim($params[1]);
            }
        }

        return self::$config_parameters;
    }

    /**
     * Check if the db exists
     */
    public static function check_db(){
        if(!file_exists(self::get_config("DB")) || filesize(self::get_config("DB")) == 0){
            echo "DB not found. Run 'php manager.php migrate'\n";
            exit();
        }
    }

    /** 
     * Check if the config file exists
    */
    public static function config_check(){
        if (!file_exists(self::config_file_name)){
            echo "Config file does not exist.\n";
            exit();
        }
    }

    /**
     * Get a parameter value from the config file
     */
    public static function get_config(string $key):string{
        $config_array = self::read_config();
        if (!array_key_exists($key, $config_array)) return "";
        return $config_array[$key];
    }

    /**
     * Print Help text
     */
    public static function help_text(bool $exit){
        echo "Usage: php manager [command]\n\nCommand:\n\nstart         Start the App server\nmigrate       Create the database\n\n";
        if ($exit) exit(); 
    }

}

?>