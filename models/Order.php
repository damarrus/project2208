<?php

require_once '../dbMac.php';

class Order 
{
    public $id;
    public $status;
    public $address;
    public $user_id;
    public $total;

    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT order_id, status, address, user_id, total FROM orders WHERE order_id = $id";
        $result = $mysqli->query($query);

        $data = $result->fetch_assoc();

        $this->id = $data['order_id'];
        $this->status = $data['status'];
        $this->address = $data['address'];
        $this->user_id = $data['user_id'];
        $this->total = $data['total'];

    }

    public static function getAll($status = false, $user_id = false)
    {
        global $mysqli; 
        $condition = "";

        if ($status != false) {
            $condition .= " AND order_id = $status";
        } 
        
        if ($user_id != false) {

            $condition .= " AND user_id = $user_id";

        }

        $query = "SELECT order_id FROM orders WHERE 1 $condition"; 
        $result = $mysqli->query($query);

        $orders = [];
        while ($order_data = $result->fetch_assoc()) {
            $orders[] = new Order($order_data['order_id']);
        }

        return $orders;
    }

}

$order_col = Order::getAll(0,0);
var_dump($order_col);



// $orders = Order::getAll(0, 1);
// foreach ($orders as $order) {
//     echo '<h1>Статус заказа: '.$order->status.'</h1>';    
//     echo '<p>Номер заказа: '.$order->id.'</p>';
//     echo '<p>Адрес: '.$order->address.'</p>';
//     echo '<p>Номер пользователя: '.$order->user_id.'</p> <hr>';
// }
// if ($orders == false) {
//     echo '<h1>Такого заказа не существует</h1>';    
// }
