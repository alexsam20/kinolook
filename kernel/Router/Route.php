<?php

namespace Kernel\Router;

class Route
{
    public function __construct(
        private readonly string $uri,
        private readonly string $method,
        private                 $action,
        private readonly array $middleware = []
    ) {}

    public static function get(string $uri, $action, array $middleware = []): static
    {
        return new static($uri, 'GET', $action, $middleware);
    }

    public static function post(string $uri, $action, array $middleware = []): static
    {
        return new static($uri, 'POST', $action, $middleware);
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getAction(): mixed
    {
        return $this->action;
    }

    public function hasMiddleware(): bool
    {
        return !empty($this->middleware);
    }

    public function getMiddleware(): array
    {
        return $this->middleware;
    }
}
