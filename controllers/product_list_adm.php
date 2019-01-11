<?php


require_once '../models/Product.php';

$products = Product::getAll();

require_once '../views/product_list_adm.php';


// order 
//status = 0  - оформлен
//status = 1  - оплачен
//status = 2  - доставлен
//status = 3  - отменен


//Создать контроллер для вызова списка товаров по аналогии с этим
// заменить require_once '../views/order_list_adm.php';
// на Json запрос
//
//к кнопке на событие  onClick вешаем принять Json
//

