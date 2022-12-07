<?php

require_once "core/boot.php";


if ($_SERVER[ 'REQUEST_METHOD' ] === "POST"){
   
}

if ($_SERVER[ 'REQUEST_METHOD' ] === "GET") { 
    if ( !empty( $_GET['category' ] ) ) {
        return include_once _PATH_ROOT . "./view/client/_product.php";
    }
    return include_once _PATH_ROOT . "./view/client/_detail.php";
}


