<?php
require_once 'core/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST[ 'email' ];
    $password = $_POST[ 'password' ];

    if( !empty($_POST['email']) && !empty($_POST['password'])){
        $user = register($_POST['email'], $_POST['password']); 
      
        if(  $user ){
            $_SESSION['user'] = $user;
            return header('location: index.php');
        }else{
            $_SESSION['message']['register'] = 'Register failed';
            return header('location: register.php');
        }
    }else{
        $_SESSION['message']['register'] = 'Register failed';
        return header('location: register.php');
    }
      
    
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include_once './view/client/_register.php';
}
