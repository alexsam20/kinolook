<?php

namespace Kernel\Router;

use JetBrains\PhpStorm\NoReturn;
use Kernel\Auth\AuthInterface;
use Kernel\Controller\Controller;
use Kernel\Database\DatabaseInterface;
use Kernel\Http\RedirectInterface;
use Kernel\Http\RequestInterface;
use Kernel\Middleware\AbstractMiddleware;
use Kernel\Session\SessionInterface;
use Kernel\View\ViewInterface;

class Router implements RouterInterface
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct(
        private readonly ViewInterface     $view,
        private readonly RequestInterface  $request,
        private readonly RedirectInterface $redirect,
        private readonly SessionInterface  $session,
        private readonly DatabaseInterface $database,
        private readonly AuthInterface     $auth
    ) {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (! $route) {
            $this->notFound();
        }

        if ($route->hasMiddleware()) {
            foreach ($route->getMiddlewares() as $middleware) {
                /** @var AbstractMiddleware $middleware */
                $middleware = new $middleware($this->request, $this->auth, $this->redirect);

                $middleware->handle();
            }
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            /** @var Controller $controller */
            $controller = new $controller;

            $controller->setView($this->view);
            $controller->setRequest($this->request);
            $controller->setRedirect($this->redirect);
            $controller->setSession($this->session);
            $controller->setDatabase($this->database);
            $controller->setAuth($this->auth);

            $controller->$action();
        } else {
            call_user_func($route->getAction());
        }

    }

    #[NoReturn]
    private function notFound(): void
    {
        echo '404 | Not Found';
        exit();
    }

    private function findRoute(string $uri, string $method): Route|false
    {
        return $this->routes[$method][$uri] ?? false;
    }

    private function initRoutes(): void
    {
        $routes = $this->getRoutes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    /**
     * @return Route[]
     */
    public function getRoutes(): array
    {
        return require APP_PATH.'/config/routes.php';
    }
}
