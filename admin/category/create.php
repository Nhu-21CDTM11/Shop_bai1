<?php

require_once "../../core/boot.php";

if ( $_SERVER['REQUEST_METHOD'] === "POST") {
    if ( !empty( $_POST['name_category' ] ) &&  !empty( $_POST['description'] ) ) {
        $name_category = $_POST['name_category'];
        $description = $_POST['description'];

        if ( $_FILES['img_category']['size'] != 0 ) {

            $img_category = uploadFileImg( $_FILES['img_category'], "Category" );
            
            $_POST['img_category'] = $img_category;
            
            insert_data( $_POST, "categories");
            return header('location: index.php');
        } else {
            $_SESSION[ 'message' ][ 'img_category' ] = "File khong duoc de trong";
        }
    }
    
    if( empty( $name_category ) ){
        $_SESSION[ 'message' ][ 'name_category' ] = "name khong duoc de trong";
    }

    if( empty( $description ) ){
        $_SESSION[ 'message' ][ 'description' ] = "description khong duoc de trong";
    }

    return redirect();
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    include_once _PATH_ROOT . "./view/admin/category/_create.php";
}
