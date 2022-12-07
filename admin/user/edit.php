<?php

require_once "../../core/boot.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])) {
        $user_id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        update_user($user_id, $email, $password, $role);
        return header("location: index.php");
    }
   
    if (empty($email)) {
        $_SESSION['message']['email'] = 'email khong duoc de trong';
    }

    if (empty($password)) {
        $_SESSION['message']['password'] = 'password khong duoc de trong';
    }

    if (empty($role)) {
        $_SESSION['message']['role'] = 'role khong duoc de trong';
    }
    
    return redirect();
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    include_once _PATH_ROOT . "./view/admin/user/_edit.php";
}
