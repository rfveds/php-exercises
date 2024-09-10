<?php

declare(strict_types=1);

namespace App\Router;

use App\Exception\RouteNotFoundException;

class Router
{
    private array $routes = [];

    public function register(string $path, callable $action): self
    {
        $this->routes[$path] = $action;

        return $this;
    }

    /**
     * @throws RouteNotFoundException
     */
    public function resolve(string $requestUri)
    {
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$route] ?? null;

        if (!$action) {
            throw new RouteNotFoundException();
        }

        return call_user_func($action);
    }
}

