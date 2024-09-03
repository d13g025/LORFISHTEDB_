<?php
//classe para pegar a uri (o que fica a frente da barra)

//declarando o namespace dessa classe
namespace app\helpers;

class Request
{
    public static function get()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}