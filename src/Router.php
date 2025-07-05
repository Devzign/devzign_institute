<?php
namespace Src;

class Router
{
    private $getRoutes = [];

    public function get($path, $callable) {
        $this->getRoutes[$path] = $callable;
    }

    public function run() {
        $uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET' && isset($this->getRoutes[$uri])) {
            $callable = $this->getRoutes[$uri];

            if (is_array($callable) && is_string($callable[0])) {
                $controller = new $callable[0];
                $callable   = [ $controller, $callable[1] ];
            }

            return call_user_func($callable);
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
