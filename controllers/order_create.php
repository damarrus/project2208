<?php

require_once '../models/Order.php';

$order_id = Order::create($_POST['status'], $_POST['adress'], $_POST['user_id'], $_POST['products']);

echo json_encode('Заказ добавлен!');

header('Location: order_create_form.php?success=1&order_id='.$order_id);
