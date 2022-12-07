<?php

if ( !function_exists( "url" ) ) {
    function url( $url, $get = "" )
    {
        $url = str_replace( ".", "/", $url );

        if ( !empty( $get ) ) {
            $get = "?" . $get;
        }
        
        return _BASE_ROOT . $url . ".php" . $get;
    }
}

if ( !function_exists("asset")) {
    function asset($url)
    {
        return _BASE_ROOT . "public/" . $url;
    }
}
if ( !function_exists( "includeView" ) ) {
    function includeView( $url, $data = [] ) {
        extract( $data );
        
        $url = _PATH_ROOT . $url;
        if ( !file_exists( $url ) ) {
            echo '<pre>';
            var_dump("khong tim thay path: " . $url);
            echo '</pre>';
            die;
        }
        return include_once  $url;

    }
}

if ( !function_exists("error")) {
    function error($error)
    {
        if (!empty($_SESSION['message'][$error])) {
            $message = $_SESSION['message'][$error];
            unset($_SESSION['message'][$error]);
            return '<div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>'. $message .'</p>
            </div>';
        }
    }
}

if ( !function_exists("error_flash")) {
    function error_flash( $error ){
        if ( !empty( $_SESSION['message'][$error] ) ) {
            $message = $_SESSION['message'][$error];
            unset($_SESSION['message'][$error]);
            return $message;
        }
    }
}

if ( !function_exists("old")) {
    function old( $name, $data = null ){
        if( !empty( $_SESSION[ 'old' ][ $name ] ) ){
            $data_old = $_SESSION[ 'old' ][ $name ];
            unset( $_SESSION[ 'old' ][ $name ] );
            return $data_old;
        }
        return $data;
       
    }
}

if ( !function_exists("rollback")) {
    function rollback(){
        $path = str_replace(_PATH_ROOT, "", $_SERVER[ 'SCRIPT_FILENAME']);
        $_SESSION[ 'rollback'] = _BASE_ROOT . $path;
       
    }
}

if ( !function_exists("redirect")) {
    function redirect(){
        if( !empty( $_SESSION[ 'rollback' ] ) ){
            $path = $_SESSION[ 'rollback' ];
            unset($_SESSION[ 'rollback' ] );
            header ( "location: $path" );
        } else{
            echo '<pre>';
            var_dump("vui long goi function rollback");
            echo '</pre>'; 
            die;
            
        }
    }
}