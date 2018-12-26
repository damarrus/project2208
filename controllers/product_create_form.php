<?php

require_once '../models/Category.php';

$categories = Category::getAll();

require_once '../views/product_create_form.php';
