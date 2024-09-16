<?php

namespace app\routes;

use app\helpers\Request;
use app\helpers\Uri;

class Router
{
    const CONTROLLER_NAMESPACE = 'app\\controllers';
    public static $pageTitle = '';

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
                '/' => ['action' => fn() => self::load('HomeController', 'index'), 'title' => 'Home'],
                '/home' => ['action' => fn() => self::load('HomeController', 'index'), 'title' => 'Home'],
                '/download' => ['action' => fn() => self::load('DownloadController', 'download'), 'title' => 'Download'],
                '/statistics' => ['action' => fn() => self::load('StatisticsController', 'statistics'), 'title' => 'Statistics'],
                '/team' => ['action' => fn() => self::load('TeamController', 'team'), 'title' => 'Team'],
                '/search' => ['action' => fn() => self::load('SearchController', 'search'), 'title' => 'Search'],
            ],
            'POST' => [
                '/search' => ['action' => fn() => self::load('SearchController', 'search'), 'title' => 'Search'],
            ]
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

            $router = $routes[$request][$uri]['action'];
            self::$pageTitle = $routes[$request][$uri]['title']; // Define o título da página
            $router();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public static function getPageTitle()
    {
        return self::$pageTitle;
    }
}
