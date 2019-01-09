<?php 

require_once '../models/Order.php';

$id = Order::status($_POST['order_id']);

header('Location: order_list_adm.php?success=1&order_id='.$id);