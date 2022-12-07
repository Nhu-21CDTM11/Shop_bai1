<?php
$pdo = get_pdo();

if (!file_exists("get_product")) {
    function get_product()
    {
        global $pdo;

        $sql = "SELECT * FROM PRODUCTS";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products ?? false;
    }
}



if (!file_exists("find_products")) {
    function find_products($category_id)
    {
        global $pdo;

        $sql = "SELECT * FROM PRODUCTS INNER JOIN CATEGORIES ON PRODUCTS.category_id = CATEGORIES.id WHERE PRODUCTS.category_id = :category_id ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":category_id", $category_id);
        $stmt->execute();

        $products = $stmt->fetchAll();
        return $products ?? false;
    }
}

if (!file_exists("get_products_by_name")) {
    function get_products_by_name($name){
        global $pdo;
    
        $sql = "SELECT * FROM PRODUCTS WHERE NAME LIKE :name";
        $stmt = $pdo->prepare($sql);
    
        $name = "%$name%";
        $stmt->bindParam(':name', $name);
        
    
        $stmt->execute();
         
        // Lấy danh sách kết quả
        $product_list = $stmt->fetchAll();
        return $product_list ?? false;
    }
}



if (!file_exists("delete_product")) {
    function delete_product($product_id)
    {

        global $pdo;

        $sql = "DELETE FROM PRODUCTS WHERE ID=:id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $product_id);


        $stmt->execute();
    }
}

if (!file_exists("update_product")) {
    function update_product($product_id, $name, $img, $description, $price, $quantity)
    {
        global $pdo;

        $sql = "UPDATE PRODUCTS SET NAME=:name, IMG=:img, DESCRIPTION=:description, PRICE=:price, QUANTITY=:quantity WHERE ID=:id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $product_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);

        $stmt->execute();
    }
}

if (!file_exists("detail_product")) {
    function detail_product($id)
    {
        global $pdo;

        $sql = "SELECT * FROM PRODUCTS WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch();
    }
}

if (!file_exists("update_quantity_product")) {
    function update_quantity_product($id, $quantity)
    {
        global $pdo;

        $sql = "UPDATE PRODUCTS SET QUANTITY=:quantity WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return true;
    }
}
