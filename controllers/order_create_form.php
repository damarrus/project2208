<?php

require_once '../models/Product.php';
require_once '../models/User.php';

$products = Product::getAll();
$users = User::getAll();

require_once '../views/order_create_form.php';
