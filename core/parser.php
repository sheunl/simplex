<?php
/* 

Filename: core/parser.php

Author: Abdulrasaq Lawani

Purpose: This file is responsible for parsing template body.

*/

include "error.php";

function parse_body($string){

$s=$string;
$change = "";
$static_images_location ="static/images/";
$static_scripts_location ="static/scripts/";

$progress = true;

while($progress){
    $p1 = strpos($s,"{{");
    $p2 = strpos($s,"}}");

    if ($p1 === false || $p2 === false)
        break;
    $type_indicator = $s[$p1+2];

    if ($type_indicator === "@"){
        $link = substr($s,$p1+2,$p2-$p1-2);
        $alink = explode("|",$link);
        if (count($alink) != 2 ) _err(err: "link_error_1");
        $change = "<a href='".trim(substr($alink[0],1)).".html'>".trim($alink[1])."</a>";
    }elseif ($type_indicator === "#"){
        $static = substr($s,$p1+2,$p2-$p1-2);
        $item = explode("|",$static);
        if (count($item) < 2 ) _err(type: "s_error");
        if(trim(substr($item[0],1)) === "image"){
            $url = str_replace(".","/",$item[1]);
            if(strrpos($url,"/"))
            $url[strrpos($url,"/")] = ".";
            if(isset($item[2]))
            {
                $width="width=".trim($item[2])."px";
            }else{
                $width ="";
            }
            $change = "<img src='".$static_images_location.trim($url)."' ".$width.">";
        }
        elseif(trim(substr($item[0],1)) === "script"){
            if (count($item) != 2 ) _err(type: "s_error");
            $url = str_replace(".","/",$item[1]);
            if(strrpos($url,"/"))
            $url[strrpos($url,"/")] = ".";
            $change = "<script src='".$static_scripts_location.trim($url).".js'></script>";
        }
       else
        {
            _err(type:"s_error");
        }
    }else{
        _err(type:"l_error");
    }
    

    $s = str_replace(substr($s,$p1,$p2-$p1+2),$change,$s);

}

return $s;

}

?>