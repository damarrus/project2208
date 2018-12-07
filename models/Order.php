<?php

require_once '../db.php';

class Order 
{
    public $id;
    public $status;
    public $address;
    public $user_id;

    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT * FROM orders WHERE order_id = $id" ;
        $result = $mysqli->query($query);
        $data = $result->fetch_assoc();
        $this->id = $data['order_id'];
        $this->status = $data['status'];
        $this->address = $data['address'];
        $this->user_id = $data['user_id'];
    }
    
    
    public static function getAll($status = false, $user_id = false)
    {
        global $mysqli;
        
        if ($status === false && $user_id === false) {
            $query = "SELECT order_id FROM orders";
            $result = $mysqli->query($query);

        } else if ($user_id === false){
            $queryTwo = "SELECT order_id FROM orders WHERE status = $status";
            $result = $mysqli->query($queryTwo);

        } else if ($status === false){
            $queryTwo = "SELECT order_id FROM orders WHERE user_id = $user_id";
            $result = $mysqli->query($queryTwo);

        } else {
            $queryThree = "SELECT order_id FROM orders WHERE status = $status AND user_id = $user_id";
            $result = $mysqli->query($queryThree);
        }
        
        // if ($user_id === false) {
        //     $query = "SELECT order_id FROM orders";
        //     $result = $mysqli->query($query);
        // }

        $orders = [];
        while ($order_data = $result->fetch_assoc()) {
            $orders[] = new Order($order_data['order_id']);
        }

        return $orders;
    }
}

// $order = new Order(3);
// var_dump($order->address);

// $orders = Order::getAll();
// var_dump($orders->user_id);

// Это используем во Views
// foreach ($orders as $order) {
//     echo '<h2>'.$order->id.'</h2>';
//     echo '<h1>'.$order->address.'</h1>';
//     echo '<h4>'.$order->user_id.'</h4> <hr>';
// }


// $orders = Order::getAll(false, false);
// foreach ($orders as $order) {
//     echo '<h1>Статус заказа: '.$order->status.'</h1>';    
//     echo '<p>Номер заказа: '.$order->id.'</p>';
//     echo '<p>Адрес: '.$order->address.'</p>';
//     echo '<p>Номер пользователя: '.$order->user_id.'</p> <hr>';
// }
// if ($orders == false) {
//     echo '<h1>Такого заказа не существует</h1>';    
// }
