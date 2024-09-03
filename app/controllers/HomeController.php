<?php

namespace app\controllers;

class HomeController
{
    public function index()
    {
        try {
            require_once __DIR__ . '/../views/home/index.php';
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
