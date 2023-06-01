<?php
/* 

Filename: Simplex.php

Author: Abdulrasaq Lawani

Purpose: This file is responsible for running all the commands for simplex from both GUI and CLI.

*/
namespace App;

use App\Server; 

// require_once "../database/DBSetup.php";

class Simplex {

    protected $all_options = ["start"=> 100,
                              "restart"=> 101,
                              "build" => 200,
                              "clean" => 300,
                              "rebuild" => 400];
    protected $config_parameters = [];
    protected $config_file_name = ".config";
    private $key = 0;


    function __construct(string $command){

        $this->key = array_key_exists($command,$this->all_options) ? $this->all_options[$command] : null;
        // $this->read_config();
       
        // print_r($this->config_parameters);

    }

    function run(){
        $this->calls($this->key);
    }

    function calls($command_key){

        switch ($command_key){
            case 100:
                $this->start_app();
            break;

            case 200:
            break;

            case 300:
            break;

            case 400:
            break;

            default:
            break;
                
        }

    }

    function start_app(){
        Server::run_server();
    }

    function read_config(){
        $config_file = fopen($this->config_file_name,"r") or die("Unable to open file!");

        /*** Read config file keys and values **/
        while(!feof($config_file)){
            $hold = fgets($config_file);
            $params = explode(":",$hold);
            if(count($params)==2){
                $this->config_parameters[trim($params[0])] =trim($params[1]);
            }
        }
    }

    function get_config():array{
        return $this->config_parameters;
    } 

}

?>