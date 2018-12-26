<?php

require_once '../models/Product.php';

$product_id = Product::create($_POST['title'], $_POST['price'], $_POST['category_id'], $_POST['collection_id']);

header('Location: product_create_form.php?success=1&product_id='.$product_id);
