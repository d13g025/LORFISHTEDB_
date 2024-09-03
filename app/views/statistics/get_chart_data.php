<?php

use app\services\Database;

header('Content-Type: application/json');

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $search = Database::getInstance()->countSearchSF($name);

    echo json_encode($search);
}
