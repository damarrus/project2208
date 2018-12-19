<?php
    var_dump($_REQUEST['product_id']);
    $product_id = $_REQUEST['product_id'];

    session_start();

    $_SESSION['product_id'] = $product_id;


    echo json_encode(true);