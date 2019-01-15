<?php

require_once '../models/Order.php';

$order = new Order($_POST['order_id']);

if ($_POST['status'] != '' && $_POST['adress'] != '' && $_POST['user_id'] != '' && $_POST['products'] != '') {
    $order->update($_POST['status'], $_POST['adress'], $_POST['user_id'], $_POST['products'], $_POST['order_id']);
    echo json_encode(1);
}

