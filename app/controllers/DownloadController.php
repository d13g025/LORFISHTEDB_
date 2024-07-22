<?php

namespace app\controllers;

class DownloadController
{
    public function download()
    {
        try{
            require_once __DIR__ . '/../views/download/download.php';
             
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        
    }
    }



?>