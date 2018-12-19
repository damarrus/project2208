<?php
    var_dump($_REQUEST['product_id']);
    die;
    $title = $data['title'];
    $price = $data['price'];

    session_start();

    $_SESSION['title'] = $title;
    $_SESSION['price'] = $price;

    echo json_encode('Ваш товар добавлен в корзину!');