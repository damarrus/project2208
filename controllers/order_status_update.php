<?php 

require_once '../models/Order.php';

// // $id = Order::set_status($_POST['order_id'], $_POST['status']);
// var_dump($_POST);
// die;
$order = new Order($_POST['order_id']);

$order->set_status($_POST['status_list']);

header('Location: order_list_adm.php?success=1&order_id='.$_POST['order_id']);