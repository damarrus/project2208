<?php

$product_id = $_REQUEST['deleteFromCart'];
// $_SESSION['cart'] = [];

session_start();
var_dump($_SESSION);
$cart = $_SESSION;
unset($cart);
die;
// header('Location: cart.php?success_delete');
// if(isset($_REQUEST['deleteFromCart'])) {
//     unset($_SESSION['Cart'][$product_id];
// }
