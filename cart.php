<?php

require_once "core/boot.php";


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = $_POST['delete'];
    $cartIdC = $_POST['cartIdC'];
    $cartIdT = $_POST['cartIdT'];

    if (!empty($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }

    $cart = $_SESSION['cart'];
    if (!empty($_SESSION['cart'][$cartIdC])) {
        foreach ($_SESSION['cart'] as $cartItem) {
            if ($cartItem['id'] == $cartIdC) {
                $cartItem['quantity_cart'] += 1;
                if ($cartItem['quantity_cart'] >= $cartItem['quantity']) {
                    $cartItem['quantity_cart'] = $cartItem['quantity'];
                }
                $_SESSION['cart'][$cartIdC] = $cartItem;
            }
        }
    }

    if (!empty($_SESSION['cart'][$cartIdT])) {
        foreach ($_SESSION['cart'] as $cartItem) {
            if ($cartItem['id'] == $cartIdT) {
                $cartItem['quantity_cart'] -= 1;
                if ($cartItem['quantity_cart'] < 1) {
                    $cartItem['quantity_cart'] = 1;
                }
                $_SESSION['cart'][$cartIdT] = $cartItem;
            }
        }
    }

    return header('location: cart.php');
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {

    if (!empty($_GET['id']) && !empty($_GET['quantity'])) {
        $id = $_GET['id'];
        $quantity = $_GET['quantity'];
        $product = detail_product($id);

        if ($product['quantity'] >= $quantity) {
            if (!empty($_SESSION['cart'][$id])) {
                foreach ($_SESSION['cart'] as $cartItem) {
                    if ($cartItem['id'] == $id) {
                        $cartItem['quantity_cart'] += $quantity;
                        $_SESSION['cart'][$id] = $cartItem;
                    }
                }
            } else {
                $product['quantity_cart'] = $quantity;
                $_SESSION['cart'][$id] = $product;
            }
        }
    }

    if(!empty($_GET['clear-all'])){
        session_destroy();
        header('location: cart.php');
    }
    include_once "./view/client/_cart.php";
}
