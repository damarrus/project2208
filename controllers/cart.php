<?php

require_once('../models/Product.php');
require_once('../models/Size.php');
session_start();
if (isset($_SESSION['cart'])) { 
    $products = [];
    foreach ($_SESSION['cart'] as $product_id) {
        $product = new Product($product_id);
        $product->sizes = Size::getAllByProduct();
        foreach($product->sizes as $size) {
            // $size = new Product($id);
        }
        $products[] = $product;
    }
    unset($_SESSION['Cart'][3]);

    // foreach($_SESSION['cart'] as $cart_item) {
    //     $product = new Product($cart_item['product_id']);
    //     // $product->size = new Size($cart_item['size_id']);
    //     // $product->count = $cart_item['count'];
    //     $products[] = $product;
    // }
}
// echo '<pre>';
// var_dump($products);
require_once('../views/cart.php');