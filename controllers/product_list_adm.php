<?php


require_once '../models/Product.php';

$products = Product::getAll();

require_once '../views/product_list_adm.php';