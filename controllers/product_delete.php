<?php

require_once '../models/Product.php';

// $product = Product::delete($_POST['product_id']);
$product = new Product($_POST['product_id']);

$product->delete($_POST['product_id']);
// var_dump($mysqli->error);
// die;

header('Location: product_delete_form.php?success=1&product_id='.$_POST['product_id']);
