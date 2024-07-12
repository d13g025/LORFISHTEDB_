<?php

use app\services\Database;

// Inclua o autoload do Composer
require '../vendor/autoload.php';

$search = Database::getInstance();   
$results = $search->getSearchAll();
    

echo $results;
?>

