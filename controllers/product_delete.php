<?php

require_once '../models/Product.php';

$product = new Product($_POST['product_id']);
// var_dump($_POST);

$product->delete();

header('Location: product_list_adm.php?success_delete=1&product_id='.$_POST['product_id']);
