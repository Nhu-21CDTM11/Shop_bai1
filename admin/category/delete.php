<?php

require_once "../../core/boot.php";

if ( $_SERVER[ 'REQUEST_METHOD' ] === "POST" ){
    // if( !empty($_POST[ 'action']) ){
   
}

if ($_SERVER[ 'REQUEST_METHOD' ] === "GET") {

    $category_id = $_GET['id'];
    delete_category($category_id);
  
    header("location: index.php");
}
