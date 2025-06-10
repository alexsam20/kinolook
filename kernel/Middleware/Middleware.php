<?php

namespace Kernel\Middleware;

use Kernel\Middleware\MiddlewareInterface;

class Middleware implements MiddlewareInterface
{

    public function check(array $middlewares = []): void
    {
        // TODO: Implement check() method.
    }
}