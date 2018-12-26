<?php
require_once '../models/Product.php';
require_once '../models/Collection.php';
// require_once '../models/Category.php';
$products = Product::getAll();
$collections = Collection::getAll();
$collection = new Collection($_GET['collection']);
// $categories = Category::getAll();
// $category = new Category ($_GET['category']);
// $error404 = Collection::getAll();
require_once '../views/catalog.php';

