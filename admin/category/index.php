<?php

require_once "../../core/boot.php";

if ( $_SERVER[ 'REQUEST_METHOD' ] === "POST" ){
  
}

if ($_SERVER[ 'REQUEST_METHOD' ] === "GET") {
    
    return include_once _PATH_ROOT . "./view/admin/category/_index.php";
}
