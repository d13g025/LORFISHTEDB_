<?php

namespace app\services;

class Download
{
    public static function download($file)
    {
        $file = 'app/views/download/' . $file . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            echo 'File not found';
        }
    }
}




