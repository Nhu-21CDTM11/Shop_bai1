<?php

require_once "../../core/boot.php";

if ( $_SERVER[ 'REQUEST_METHOD' ] === "POST" ){
    // if( !empty($_POST[ 'action']) ){
   
}

if ($_SERVER[ 'REQUEST_METHOD' ] === "GET") {

    $product_id = $_GET['id'];
    delete_product($product_id);
  
    header("location: index.php");
}
