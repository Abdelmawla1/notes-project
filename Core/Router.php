<?php

namespace Core;

use Core\Middleware\Middleware;
use JetBrains\PhpStorm\NoReturn;

class Router
{
    protected array $routes = [];

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                Middleware::resolve($route['middleware']);
                return require base_path('Http/controllers/'.$route['controller']);
            }
        }
        $this->abort();
    }

    public function add($method, $uri, $controller, $middleware = null)
    {
//        $this->routes[] = compact('method','uri','controller'); // i forgot here to 'middleware'
//        Warning: Undefined array key "middleware" in Router.php on line 22
//        line 22 is Middleware::resolve($route['middleware']);
//        don't forget to add $middleware = null in add()
//        public function add($method, $uri, $controller, $middleware = null)

        $this->routes[] = compact('method','uri','controller','middleware');
        return $this;
    }

    public function get($uri, $controller)
    {
       return $this->add(strtoupper(__FUNCTION__),$uri,$controller);
    }

    public function post($uri, $controller)
    {
        return $this->add(strtoupper(__FUNCTION__),$uri,$controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add(strtoupper(__FUNCTION__),$uri,$controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add(strtoupper(__FUNCTION__),$uri,$controller);
    }

    public function put($uri, $controller)
    {
        return $this->add(strtoupper(__FUNCTION__),$uri,$controller);
    }
    #[NoReturn] function abort(int $response_code = 404 ): void
    {
        http_response_code($response_code);
        require base_path("views/{$response_code}.php");
        die();
    }
}