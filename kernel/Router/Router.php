<?php

namespace App\Kernel\Router;

class Router
{
    public function dispatch(string $uri)
    {
        $routes = require APP_PATH.'/config/routes.php';

        $routes[$uri]();
    }
}