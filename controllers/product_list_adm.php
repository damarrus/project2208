<?php


require_once '../models/Product.php';
require_once '../models/Category.php';
require_once '../models/Product.php';

// $product = new Product($_GET['product_id']);

$categories = Category::getAll();

$products = Product::getAll();

require_once '../views/product_list_adm.php';