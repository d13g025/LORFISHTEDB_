<?php
namespace App\Controllers;

use app\services\Database;
use PDOException;

class SpeciesController
{
    public function species()
    {
        try {
            
            require_once __DIR__ . '/../views/species/species.php';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}