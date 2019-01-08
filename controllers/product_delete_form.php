<?php

require_once '../models/Product.php';

$products = Product::getAll();

require_once '../views/product_delete_form.php';