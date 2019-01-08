<?php

require_once '../models/Product.php';

$products = Product::getAll();

require_once '../views/order_create_form.php';
