<?php
/**
 * Entry point into application
 */
require_once "../autoloader.php";

use App\MVC;

MVC::router(substr($_SERVER['REQUEST_URI'],1));

       
?>