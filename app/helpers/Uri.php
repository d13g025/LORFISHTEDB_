<?php
//classe para pegar a uri (o que fica a frente da barra)

//declarando o namespace dessa classe
namespace app\helpers;


//classe para pegar a uri
class Uri
{
    public static function get($type):string 
    {
        //retorna a uri atraves do parse_url com paramentro da classe $_SERVER 
        return parse_url($_SERVER['REQUEST_URI'])[$type]; 
    }
}