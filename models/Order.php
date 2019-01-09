<?php

require_once '../db.php';

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

    public static function getAll($status = false, $user_id = false, $page = 1)
    {
        global $mysqli; 
        $page -= 1;
        $count_items = 5;
        $condition = "";

        if ($status != false) {
            $condition .= " AND status = $status";
        } 
        
        if ($user_id != false) {
            $condition .= " AND user_id = $user_id";
        }

        $query = "SELECT COUNT(*) as count FROM orders";
        $result = $mysqli->query($query);
        $count = $result->fetch_assoc();

        if ($count['count'] < $page * $count_items) {
            return false;
        } 

        $limit = ' LIMIT ' . ($page * $count_items) . ', ' . $count_items;

        $query = "SELECT order_id FROM orders WHERE 1 $condition $limit";
        $result = $mysqli->query($query);

        $orders = [];
        while ($order_data = $result->fetch_assoc()) {
            $orders[] = new Order($order_data['order_id']);
        }

        return [
            'orders' => $orders, 
            'count' => $count['count']
        ];
    }

    public static function create($status, $adress, $user_id, $products)
    {
        global $mysqli;

        $query = "INSERT INTO orders SET 
                    status=$status, 
                    address='$adress', 
                    user_id=$user_id,
                    total=0
        ";
        $result = $mysqli->query($query);

        $insert_id = $mysqli->insert_id;

        foreach ($products as $product) {
            $query = "INSERT INTO order_products SET 
                        order_id=$insert_id, 
                        product_id={$product['product_id']}, 
                        size_id=0,
                        price={$product['price']},
                        count=0
            ";
            $result = $mysqli->query($query);
        }

        return $insert_id;
    }

}

// $order_col = Order::getAll(0,0);
// var_dump($order_col);



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
