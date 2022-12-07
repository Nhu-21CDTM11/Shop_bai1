<?php
require_once 'core/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_SESSION['cart'])){
 
        $order = array(
            'code' => string_random(10),
            'status' => 'pending',
            'user_id' => 1
        );
    
        insert_order(
            $order['code'],
            $order['status'],
            $order['user_id']
        );
    
        $find_order = find_order_by_code($order['code']);
    
        $cart = $_SESSION['cart'];
            
        foreach( $cart as $ods ){
            $order_detail = array(
                'id' => $ods['id'],
                'order_id' => $find_order['id'],
                'quantity' => $ods['quantity_cart']
            );
        
            insert_order_detail(
                $order_detail['id'],
                $order_detail['order_id'],
                $order_detail['quantity'],
            );
            
            $quantity = $ods[ 'quantity'] - $order_detail['quantity'];
            $product = update_quantity_product( $order_detail['id'], $quantity );
         
        }
        
        unset($_SESSION['cart']);
        header('Location: cart.php');

    }else{
        header('Location: index.php');
    } 
}