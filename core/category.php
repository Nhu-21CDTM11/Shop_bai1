<?php
$pdo = get_pdo();
$name = "";


if (!file_exists("get_categories")) {
    function get_categories()
    {
        global $pdo;

        $sql = "SELECT * FROM CATEGORIES";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll();

        return $categories ?? false;
    }
}

if (!file_exists("find_category_products")) {
    function find_category_products($id)
    {
        global $pdo;

        $sql = "SELECT * FROM CATEGORIES INNER JOIN PRODUCTS ON PRODUCTS.category_id = CATEGORIES.id WHERE CATEGORIES.id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $category = $stmt->fetchAll();
        return $category ?? false;
    }
}

if (!file_exists("find_category")) {
    function find_category($id)
    {
        global $pdo;

        $sql = "SELECT * FROM CATEGORIES INNER JOIN PRODUCTS ON PRODUCTS.category_id = CATEGORIES.id WHERE CATEGORIES.id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $category = $stmt->fetch();
        return $category ?? false;
    }
}

if (!file_exists("detail_category")) {
    function detail_category($id)
    {
        global $pdo;

        $sql = "SELECT * FROM CATEGORIES WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $category = $stmt->fetch();
        return $category ?? false;
    }
}


// if ( !file_exists( "insert_categories" ) ) {
//     function insert_categories( $name_category, $img_category,  $description ) {

//         global $pdo;

//         $sql = "INSERT INTO categories( NAME_CATEGORY, IMG_CATEGORY, DESCRIPTION ) VALUES ( :name_category, :img_category, :description )";

//         $stmt = $pdo->prepare( $sql );
//         $stmt->bindParam( ":name_category", $name_category );
//         $stmt->bindParam( ":img_category", $img_category );
//         $stmt->bindParam( ":description", $description );

//         $stmt->execute();
//     }
// }

if( !file_exists( "insert_data" ) ) { 
    function insert_data($data = [] , $table){
        global $pdo;

        $fields = "";
        $values = "";
        foreach ($data as $key => $value) {
            $fields .= $key . ",";
            $values .= "'$value' ,";
        }
        $fields = trim($fields, ",");
        $values = trim($values, ",");

        $sql = "INSERT INTO $table ($fields) VALUES ($values)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
}

if (!file_exists("delete_category")) {
    function delete_category($category_id)
    {

        global $pdo;

        $sql = "DELETE FROM CATEGORIES WHERE ID=:id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $category_id);


        $stmt->execute();
    }
}

if (!file_exists("update_category")) {
    function update_category( $category_id, $name_category, $img_category, $description )
    {
        global $pdo;

        $sql = "UPDATE CATEGORIES SET NAME_CATEGORY=:name_category, IMG_CATEGORY=:img_category, description=:description WHERE ID=:id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $category_id);
        $stmt->bindParam(':name_category', $name_category);
        $stmt->bindParam(':img_category', $img_category);
        $stmt->bindParam(':description', $description);

        $stmt->execute();
        
    }
}

