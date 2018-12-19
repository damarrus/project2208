<?php

require_once('../models/Product.php');

$productscol = Product::getAll();

require_once('../views/product.php');