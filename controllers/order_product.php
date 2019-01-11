<?php

if(isset($_POST['order_id']))
{
    $order_id = $_POST['order_id'];
}
 // var_dump($order_id)

 require_once '../models/Product.php';
 $order_products = Product::getAll( false, false, $order_id );

echo json_encode($order_products);



?>