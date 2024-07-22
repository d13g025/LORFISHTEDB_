<?php

namespace app\routes;

use app\helpers\Request;
use app\helpers\Uri;

class Router
{
    const CONTROLLER_NAMESPACE = 'app\\controllers';

    public static function load(string $controller, string $method, array $params = [])
    {
        try {
            $controllerNamespace = self::CONTROLLER_NAMESPACE . '\\' . $controller;
            
            if (!class_exists($controllerNamespace)) {
                throw new \Exception('Controller não encontrado');
            }

            $controllerInstance = new $controllerNamespace;

            if (!method_exists($controllerInstance, $method)) {
                throw new \Exception('Método não encontrado');
            }

            $controllerInstance->$method(...array_values($params));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public static function routes(): array
    {
        return [
            'GET' => [
                '/' => fn() => self::load('HomeController', 'index'),
                '/search' => fn() => self::load('SearchController', 'search'),
                '/download' => fn() => self::load('DownloadController', 'download'),
                '/teste' => fn() => self::load('TesteController', 'teste', ['param1' => 'valor1', 'param2' => 'valor2']),
                '/species' => function () {
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    self::load('SpeciesController', 'species', ['page' => $page]);
                },
            ],
            'POST' => [
                '/result' => function () {
                    $param1 = null;

                    if (isset($_POST['btn_gff'])) {
                        $param1 = $_POST['btn_gff'];
                    } elseif (isset($_POST['btn_fasta'])) {
                        $param1 = $_POST['btn_fasta'];
                    }

                    self::load('TesteController', 'result', ['param1' => $param1]);
                },
            ],
                ];
    }

    public static function execute()
    {
        try {
            $routes = self::routes();
            $request = Request::get();
            $uri = Uri::get('path');

            if (!isset($routes[$request])) {
                throw new \Exception('404 - Rota não encontrada');
            }

            if (!array_key_exists($uri, $routes[$request])) {
                throw new \Exception('404 - Rota não encontrada');
            }

            $router = $routes[$request][$uri];
            $router();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>
