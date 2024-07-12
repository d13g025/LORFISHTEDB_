<?php

namespace app\routes;

use app\helpers\Request;
use app\helpers\Uri;
//use app\controllers\HomeController;
//use app\controllers\SearchController;
//use app\services\Database;

class Router
{
    const CONTROLLER_NAMESPACE = 'app\\controllers';

    public static function load(string $controller, string $method, array $params = [])
    {

        try {
            $controllerNamespace = self::CONTROLLER_NAMESPACE.'\\'.$controller;
            //verifica se o controller existe
            if(!class_exists($controllerNamespace)){
                throw new \Exception('Controller não encontrado');
            }

            $controllerInstance = new $controllerNamespace;

            //verifica se o metodo existe
            if(!method_exists($controllerInstance, $method)){
                throw new \Exception('Método não encontrado');
            }

            // Passando parâmetros adicionais para o método do controlador
             $controllerInstance->$method(...array_values($params));
            
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public static function routes(): array
    {
        return [
            'GET' => [
                '/' => fn()=> self::load('HomeController', 'index'),  
                '/search' => fn()=> self::load('SearchController', 'search'),
                '/species' => function () {
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                self::load('SpeciesController', 'species', ['page' => $page]);
            },
            ],
            'POST' => [
                'Search' => fn()=> self::load('SearchController', 'search'), 
            ],
        ];
    }

    public static function execute()
    {
        try {
            $routes = self::routes();
            $request = Request::get();
            $uri = Uri::get('path');
    
            // Verifica se o método da requisição existe nos routes
            if (!isset($routes[$request])) {
                throw new \Exception('404 - Rota não encontrada');
            }
    
            // Verifica se a URI está definida nas rotas
            if (!array_key_exists($uri, $routes[$request])) {
                throw new \Exception('404 - Rota não encontrada');
            }
    
            // Executa apenas a rota correspondente à URI solicitada
            $router = $routes[$request][$uri];
            $router();
    
        } catch (\Throwable $th) {
            echo $th->getMessage(); // Exibe a mensagem de erro
        }
    }
    
    
}
