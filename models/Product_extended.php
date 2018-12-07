<?php

require_once '../db.php';

class Product 
{
    public $id;
    public $title;
    public $price;
    public $category_id;
    public $collection_id;

    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT product_id, title, price, category_id, collection_id FROM products WHERE product_id=$id";
        $result = $mysqli->query($query);

        $data = $result->fetch_assoc();

        $this->id = $data['product_id'];
        $this->title = $data['title'];
        $this->price = $data['price'];
        $this->category_id = $data['category_id'];
        $this->collection_id = $data['collection_id'];

    }

    public static function getAll()
    {
        global $mysqli;
        
        $query = "SELECT product_id FROM products";
        $result = $mysqli->query($query);

        $products = [];
        while ($product_data = $result->fetch_assoc()) {
            $products[] = new Product($product_data['product_id']);
        }

        return $products;
    }

    public static function getAllbyField($category_id = false, $collection_id = false, $order_id = false)
    {
        global $mysqli; 

        $condition = "";
        $tables = "products";

        if ($category_id != false) {

            $condition .= " AND category_id = $category_id";

        } 
        
        if ($collection_id != false) {

            $condition .= " AND collection_id = $collection_id";

        }

        if ($order_id != false) {

            $tables .= ", orders";
            $condition .= " AND order_id = $order_id";

        }

        $query = "SELECT product_id FROM $tables WHERE 1 $condition"; 
        var_dump($query);
        $result = $mysqli->query($query);

        $products = [];
        while ($product_data = $result->fetch_assoc()) {
            $products[] = new Product($product_data['product_id']);
        }

        return $products;
    }

}

$productscol = Product::getAllbyField(false,false,1);
var_dump($productscol);

