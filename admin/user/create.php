<?php

require_once "../../core/boot.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        insert_data($_POST, "users");
        return header("location: index.php");
    }

    if (empty($email)) {
        $_SESSION['message']['email'] = 'Name khong duoc de trong';
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
    include_once _PATH_ROOT . "./view/admin/user/_create.php";
}
