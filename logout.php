<?php
require_once "core/boot.php";

if ( !empty( $_SESSION[ 'user' ] ) ){
    $_SESSION['message']['logout'] = "Logout Successfully";
    logout();
} else {
    $_SESSION['message']['logout'] = "You are not log in";
}


return header("location: index.php");

