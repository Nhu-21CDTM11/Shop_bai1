<?php

require_once "../core/boot.php";


if ($_SERVER[ 'REQUEST_METHOD' ] === "POST"){
   
}

if ($_SERVER[ 'REQUEST_METHOD' ] === "GET") {
    $orders = monthOrder(); 
    $months = [];
    $data = [];
    foreach (  $orders as $key => $value) {
        if ( !in_array( $value['monthName'], $months)) {
            $months[] = $value['monthName'];
            $column = find_date( $value[ 'created_at' ] ) ;
            $data[] = $column;
        }
    }
    
    include_once _PATH_ROOT . "./view/admin/_home.php";
}
