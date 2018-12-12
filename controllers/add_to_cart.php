<?php
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $title = $data['title'];
    $price = $data['price'];

    session_start();

    $_SESSION['title'] = $title;
    $_SESSION['price'] = $price;

    echo json_encode('Ваш товар добавлен в корзину!');