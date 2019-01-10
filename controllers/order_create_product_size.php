<?php

require_once '../models/Size.php';

$sizes = Size::getAllByProduct($_POST['id']);

foreach ($sizes as $size) {
    echo $size->value;
}

//echo json_encode($sizes->$value);