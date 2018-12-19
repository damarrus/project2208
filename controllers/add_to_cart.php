<?php
   
    $product_id = $_REQUEST['product_id'];
    $_SESSION['cart'] = [];

    session_start();

    $_SESSION['cart'][] = $product_id;
    var_dump($_SESSION['cart']);

    echo json_encode(true);