<?php

namespace App\Kernel;

use App\Kernel\Router\Router;

class App
{
    public function run()
    {
        $router = new Router();

        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $router->dispatch($uri, $method);
    }
}
