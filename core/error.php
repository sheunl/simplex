<?php
/* 

Filename: core/error.php

Author: Abdulrasaq Lawani

Purpose: This file is responsible for outputing errors to CLI.

*/

function _err($err="",$type="custom",$debug_info=[]){
   switch ($type){
    case "custom":
        echo "$err"."\n";
        break;
    case "l_error":
        echo "Link Error"."\n";
        break;
    case "t_error":
        echo "Template Error"."\n";
        break;
    case "s_error":
        echo "Static Error"."\n";
        break;
    default:
        echo "Unknown Error.\n";
   } 
 
   exit;
}

?>