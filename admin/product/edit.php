<?php

require_once "../../core/boot.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['quantity'])) {
        $product_id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        if ($_FILES['img']['size'] > 0) {
            $img = uploadFileImg($_FILES['img'], "nhu");

        } else {
            $img = $_POST['img'];
        }
        update_product( $product_id, $name, $img, $description, $price, $quantity );
        return header('Location: index.php');
    }
    
    if( empty( $name ) ){
        $_SESSION[ 'message' ][ 'name' ] = "name khong duoc de trong";
    }

    if( empty( $description ) ){
        $_SESSION[ 'message' ][ 'description' ] = "description khong duoc de trong";
    }
    
    if ( empty( $price ) ){
        $_SESSION['message']['price'] = 'price khong duoc de trong';
    }

    if ( empty( $quantity ) ){
        $_SESSION['message']['quantity'] = 'quantity khong duoc de trong';
    }

    return redirect();

}

if ($_SERVER['REQUEST_METHOD'] === "GET") {

    include_once _PATH_ROOT . "./view/admin/product/_edit.php";
}
