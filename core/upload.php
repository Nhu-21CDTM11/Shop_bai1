<?php

if( !function_exists( "uploadFileImg" ) ){
    function uploadFileImg( $files, $folder ){
       
        $name = $files['name'];
        $tmp_name = $files['tmp_name'];

        $type = $files['type'];
        $array_type = ["image/png", "image/jpg", "image/jpeg"];

        if ( in_array( $type, $array_type ) ){
            
            $path = _PATH_ROOT . "public/images/$folder/";
            if ( !file_exists( $path ) ){
                mkdir( $path );
            }

            $image = $path . time () . $name; //path save file
        
            if ( move_uploaded_file( $tmp_name, $image ) ) {
                $image_category = str_replace( "C:/xampp1/htdocs/BAI1/public/", "", $image);
                return $image_category;
            }
            
            echo '<pre>';
            var_dump("ERROR UPLOAD FILE");
            echo '</pre>'; 
            die;
        }

    }
}