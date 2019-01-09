<?php

require_once '../models/Product.php';

$product = new Product($_POST['product_id']);

$product->delete();


header('Location: product_delete_form.php?success=1&product_id='.$_POST['product_id']);
