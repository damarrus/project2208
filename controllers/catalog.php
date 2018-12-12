<?php

require_once '../models/Product.php';
require_once '../models/Category.php';
$products = Product::getAll();
$categories = Category::getAll();
$category_id = Product::getAll();
require_once '../views/catalog.php';

