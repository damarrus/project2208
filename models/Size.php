<?php

require_once '../db.php';

class Size
{
    public $id;
    public $value;


    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT size_id, value FROM sizes WHERE size_id=$id";
        $result = $mysqli->query($query);

        $data = $result->fetch_assoc();

        $this->id = $data['size_id'];
        $this->value = $data['value'];
    }

    public static function getAll()
    {
        global $mysqli;
        
        $query = "SELECT size_id FROM sizes";
        $result = $mysqli->query($query);

        $users = [];
        while ($size_data = $result->fetch_assoc()) {
            $sizes[] = new size($size_data['size_id']);
        }

        return $sizes;
    }

    public static function getAllByProduct($product_id = false)

    {
        global $mysqli;
        
        if ($product_id = false) {
                $query = "SELECT size_id FROM product_sizes WHERE product_id=$product_id";
            } 
            else {
                $query = "SELECT size_id, value FROM sizes WHERE size_id=$id";
            }

        $query = "SELECT size_id FROM product_sizes WHERE product_id=$product_id";
        $result = $mysqli->query($query);

        $sizes = [];
        while ($size_data = $result->fetch_assoc()) {
            $sizes[] = new size($size_data['size_id']);
        }

        return $sizes;
    }
}

// $size = new Size(2);
// var_dump($size->value);
$sizes = Size::getAllByProduct(1);
// $sizes = Size::getAll();
// var_dump($sizes);

foreach ($sizes as $size) {
    echo '<h1>'.$size->value.'</h1>';
}