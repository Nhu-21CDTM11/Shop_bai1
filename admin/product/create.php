<?php

require_once "../../core/boot.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['quantity'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        if ($_FILES['img']['size'] > 0) {
            $img = uploadFileImg($_FILES['img'], "Product");
            $_POST['img'] = $img;
           
            insert_data($_POST, "products");
            return header("location: index.php");
        } else {
            $_SESSION['message']['img'] = 'File khong duoc de trong';
        }
    }
    
    if ( empty( $name ) ){
        $_SESSION['message']['name'] = 'Name khong duoc de trong';
    }

    if ( empty( $description ) ){
        $_SESSION['message']['description'] = 'description khong duoc de trong';
    }

    if ( empty( $price ) ){
        $_SESSION['message']['price'] = 'price khong duoc de trong';
    }
    if ( empty( $quantity ) ){
        $_SESSION['message']['quantity'] = 'quantity khong duoc de trong';
    }

    return redirect();
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    include_once _PATH_ROOT . "./view/admin/product/_create.php";
}
