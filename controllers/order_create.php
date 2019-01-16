<?php

require_once '../models/Order.php';

if ($_POST['status'] != '' && $_POST['adress'] != '' && $_POST['user_id'] != '' && $_POST['products'] != '') {
    $order_id = Order::create($_POST['status'], $_POST['adress'], $_POST['user_id'], $_POST['products']);
    echo json_encode($order_id);
} else {
    echo json_encode(0);
}

// header('Location: order_create_form.php?success=1&order_id='.$order_id);
