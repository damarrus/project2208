<?php

require_once('../models/Product.php');
require_once('../models/Size.php');


$productscol = Product::getAll();
$product = new Product($_GET['product_id']);
$sizes = Size::getAllByProduct($_GET['product_id']);


require_once('../views/product.php');