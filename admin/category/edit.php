<?php

require_once "../../core/boot.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_POST['name_category']) && !empty($_POST['description'])) {
        $category_id = $_POST['id'];
        $name_category = $_POST['name_category'];
        $description = $_POST['description'];


        if ($_FILES['img_category']['size'] > 0) {
            $img_category = uploadFileImg($_FILES['img_category'], "Product");

        } else {
            $img_category = $_POST['img_category'];
        }
        update_category( $category_id, $name_category, $img_category, $description );
        return header('Location: index.php');
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

    include_once _PATH_ROOT . "./view/admin/category/_edit.php";
}
