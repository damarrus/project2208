<?php

require_once '../models/Product.php';

$product_id = Product::delete($_POST['product_id']);

header('Location: product_delete_form.php?success=1&product_id='.$product_id);