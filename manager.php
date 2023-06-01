<?php 

// require_once "app/Simplex.php";
require_once "autoloader.php";

use App\Core;

$cli_string = $argv[1];

$server = new Core($cli_string);
$server->cli_call();


