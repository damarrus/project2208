<?php

require_once '../models/Category.php';
require_once '../models/Product.php';

$product = new Product($_GET['product_id']);

$categories = Category::getAll();

require_once '../views/product_update_form.php';
