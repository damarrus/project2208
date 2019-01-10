<?php

$mysqli = new mysqli('localhost', 'root', '', 'shop2208');


if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
// echo 'Соединение установлено... ' . $mysqli->host_info . "\n";
$mysqli->set_charset("utf8");
// $mysqli->close();

?>


