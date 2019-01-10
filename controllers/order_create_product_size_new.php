<?php

require_once '../models/Size.php';

$sizes = Size::getAllByProduct($_POST['id']);

echo json_encode($sizes);