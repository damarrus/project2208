<?php
require_once '../db.php'; // к базе

$name = mysqli_real_escape_string($link, $_POST['new_name']);
$login = mysqli_real_escape_string($link, $_POST['new_login']); // разбираем массив
$pass1 = mysqli_real_escape_string($link, $_POST['new_pass1']); // и защищаемся от sql инекций.
$pass2 = mysqli_real_escape_string($link, $_POST['new_pass2']);

//var_dump($name, $login, $pass1);
// NOW()  data+time
if ($login != '' && $pass1 != '' && $pass2 != '') {
    if ($pass1 == $pass2){

        $query = "SELECT  id FROM users WHERE login = '$login'";  // запрос на проверку имени есть такое??
        $result = mysqli_query($link, $pass1);
        
        if (mysqli_num_rows($result) == 0) {  // если есть то login_exist если нет добавить
            $password = $pass1;
            $options = [
                'cost' => 8,
            ];
            $hash = password_hash($password, PASSWORD_DEFAULT, $options); // преобразовать в хеш
            $query = "INSERT INTO users (`name`,`login`, `pass`) 
            VALUES ('$name','$login', '$hash')";
            //var_dump($query);    
            $result = mysqli_query($link, $query); //получаем запрос в переменную
            if ($result) {  // проверяем запрос на не пустой
                header('Location: ../controllers/order_list_adm.php');
                // echo $user 'ВЫ авторизованы'; // пробуем приветствовать
                exit;
            } else {
            header('Location: ../views/add_user.php?error=db_error');
            exit;
            }
        } else {
           // var_dump($login); 
           // var_dump($query 'это запрос'); 
            header('Location: ../views/add_user.php?error=login_exist');
            exit;
        }
   
    } else {
        header('Location: ../views/add_user.php?error=pssa_not_match');
        exit;
    }    
} else {
    header('Location: ../views/add_user.php?error=empty_fields');
    exit;
}



?>