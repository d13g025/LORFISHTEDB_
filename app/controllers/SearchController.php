<?php

namespace app\controllers;

class SearchController
{
    public function search()
    {
        try {
            require_once __DIR__ . '/../views/search/search.php';
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function searchResult()
    {
        try {
            require_once __DIR__ . '/../views/search/search.php';
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
