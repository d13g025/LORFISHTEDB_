<?php
namespace App\Controllers;

use PDOException;

class SearchController
{
    public function search()
    {
        try {

            require_once __DIR__ . '/../views/search/search.php';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}