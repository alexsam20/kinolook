<?php

namespace App\Kernel\Router;

class Router
{
    public function dispatch(string $uri)
    {
        $routes = $this->getRoutes();

        $routes[$uri]();
    }

    public function getRoutes(): array
    {
        return require APP_PATH.'/config/routes.php';
    }
}