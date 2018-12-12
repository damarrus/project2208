<?php

require_once '../models/Product.php';

$products = Product::getAll();

require_once '../views/catalog.php';
