<?php

namespace App\Kernel\Router;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct()
    {
        $routes = $this->initRoutes();
    }


    public function dispatch(string $uri)
    {
        $routes = $this->getRoutes();

        $routes[$uri]();
    }

    private function initRoutes()
    {
        $routes = $this->getRoutes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
//        dd($this->routes);
    }

    /**
     * @return Route[]
     */
    public function getRoutes(): array
    {
        return require APP_PATH.'/config/routes.php';
    }
}