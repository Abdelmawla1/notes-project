<?php

namespace Core;

use JetBrains\PhpStorm\NoReturn;

class Router
{
    protected array $routes = [];

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    public function add($method, $uri, $controller): void
    {
        $this->routes[] = compact('method','uri','controller');
    }

    public function get($uri, $controller): void
    {
        $this->add(strtoupper(__FUNCTION__),$uri,$controller);
    }

    public function post($uri, $controller): void
    {
        $this->add(strtoupper(__FUNCTION__),$uri,$controller);
    }

    public function delete($uri, $controller): void
    {
        $this->add(strtoupper(__FUNCTION__),$uri,$controller);
    }

    public function patch($uri, $controller): void
    {
        $this->add(strtoupper(__FUNCTION__),$uri,$controller);
    }

    public function put($uri, $controller): void
    {
        $this->add(strtoupper(__FUNCTION__),$uri,$controller);
    }
    #[NoReturn] function abort(int $response_code = 404 ): void
    {
        http_response_code($response_code);
        require base_path("views/{$response_code}.php");
        die();
    }
}