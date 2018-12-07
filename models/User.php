<?php

require_once '../db.php';

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


