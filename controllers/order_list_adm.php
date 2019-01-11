<?php


require_once '../models/Order.php';

if (isset($_GET['page']) && $_GET['page'] != '') {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$data = Order::getAll(false, false, $page);

$orders = $data['orders'];

require_once '../views/order_list_adm.php';


// order 
//status = 0  - оформлен
//status = 1  - оплачен
//status = 2  - доставлен
//status = 3  - отменен

// План действий
// 1. к кнопке на событие  Click вешаем метку order-id в JS , прицепить файл order_id.js в шаблон формы (в футере)
// 2. AJax запрос который передаст order-id в контроллер order_products.php
// 3. контроллер Products
// 4. Обработчик на Ajax запрос  (вывод товара )
// 5.

//Создать контроллер для вызова списка товаров по аналогии с этим
// заменить require_once '../views/order_list_adm.php';
// на Json запрос
//

//

