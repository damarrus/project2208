<?php

require_once '../models/Product.php';
require_once '../models/Order.php';
require_once '../models/User.php';
require_once '../models/Size.php';

$products = Product::getAll();
$order = new Order($_GET['order_id']);
$list = Order::getList($_GET['order_id']);
$users = User::getAll();

$arr = [];
$i = 0;
$k = count($list) - 1;

while ($i <= $k) {
    $sizes = Size::getAllByProduct($list[$i]['product_id']);
    $arr[] = $sizes;
    $i++;
}

require_once '../views/order_update_form.php';