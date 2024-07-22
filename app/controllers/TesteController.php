<?php

namespace App\Controllers;

class TesteController
{

    public function teste()
    {

        try {
            require_once __DIR__ . '/../views/teste/teste.php';
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function result($param1 = null)
    {
        try {      
         // Inclui a view result.php
            require_once __DIR__ . '/../views/teste/result.php';
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>
