<?php

require_once '../db.php';

class Category
{
    public $category_id;
    public $title;
    public $description;
    public function __construct($category_id){
       global $mysqli;
       $query = "SELECT category_id, title, description FROM categories WHERE category_id=$category_id";
               
        $result = $mysqli->query($query);

        $data = $result->fetch_assoc();

        $this->id = $data['category_id'];
        $this->title = $data['title'];
        $this->description = $data['description'];

    }


        public static function getAll()
    {
        global $mysqli;
        
        $query = "SELECT category_id FROM categories";
        $result = $mysqli->query($query);

        $categories = [];
        while ($categories_data = $result->fetch_assoc()) {
            $categories[] = new Category($categories_data['category_id']);
        }

        return $categories;
    }

}

   /* $new1 = new Category(1);
    var_dump($new1->description);*/

    /*$categories = Category::getAll();
    
    foreach ($categories as $cat) {
        echo '<h1>'.$cat->description.'</h1>';
    }*/


/*

class User 
{
    public $id;
    public $name;
    public $login;
    public $pass;

    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT user_id, name, login, pass FROM users WHERE user_id=$id";
        $result = $mysqli->query($query);

        $data = $result->fetch_assoc();

        $this->id = $data['user_id'];
        $this->name = $data['name'];
        $this->login = $data['login'];
        $this->pass = $data['pass'];
    }

    public static function getAll()
    {
        global $mysqli;
        
        $query = "SELECT user_id FROM users";
        $result = $mysqli->query($query);

        $users = [];
        while ($user_data = $result->fetch_assoc()) {
            $users[] = new User($user_data['user_id']);
        }

        return $users;
    }
}

// $user = new User(1);
// var_dump($user->login);

// $users = User::getAll();
// var_dump($users);

// Это используем во Views
// foreach ($users as $user) {
//     echo '<h1>'.$user->name.'</h1>';
// }


*/