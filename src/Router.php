<?php
class Router {
    private $getRoutes = [];

    public function get($path, $callable) {
        $this->getRoutes[$path] = $callable;
    }

    public function run() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET' && isset($this->getRoutes[$uri])) {
            echo call_user_func($this->getRoutes[$uri]);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
