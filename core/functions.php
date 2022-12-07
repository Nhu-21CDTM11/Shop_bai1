<?php
$pdo = get_pdo();


if (!function_exists("total_cart")) {
    function total_cart()
    {
        $total = 0;
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            foreach ($cart as $cartItem) {
                $total += $cartItem['price'] * $cartItem['quantity_cart'];
            }
        }
        return number_format($total, 0, '', ',');
    }
}

if (!function_exists("number_cart")) {
    function number_cart()
    {
        $number = 0;
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            foreach ($cart as $cartItem) {
                $number += $cartItem['quantity_cart'];
            }
        }
        return $number;
    }
}

if (!function_exists("string_random")) {
    function string_random($leng = 10)
    {
        $keys = array_merge(range(0, 9), range('a', 'z'));

        $key = "";
        for ($i = 0; $i < $leng; $i++) {
            $key .= $keys[mt_rand(0, count($keys) - 1)];
        }
        return $key;
    }
}
