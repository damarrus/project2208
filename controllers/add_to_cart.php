<?php

    $product_id = $_REQUEST['product_id'];
    $size = $_REQUEST['size'];

    $_SESSION['cart'] = [];
    $_SESSION['size'] = [];

    session_start();

    if(isset($_REQUEST['product_id'])) {
    $_SESSION['cart'][] = $product_id;
    }

    if(isset($_REQUEST['size'])) {
    $_SESSION['size'][] = $size;
    }
    
    $order = count($_SESSION['cart']);
    echo json_encode($order);