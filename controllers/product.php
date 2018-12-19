<?php

require_once('../models/product.php');

$productscol = Product::getAll();

require_once('../views/product.php');