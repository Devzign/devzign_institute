class Router {
    private $getRoutes = [];

    public function get($path, $callable) {
        $this->getRoutes[$path] = $callable;
    }

    public function run() {
        // strip query-string, etc.
        $uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET' && isset($this->getRoutes[$uri])) {
            $callable = $this->getRoutes[$uri];

            // if the route is [ 'Fully\Qualified\ControllerName', 'method' ]
            if (is_array($callable) && is_string($callable[0])) {
                // instantiate the controller
                $controller = new $callable[0];
                // replace the class name with the instance
                $callable   = [ $controller, $callable[1] ];
            }

            // now call it
            return call_user_func($callable);
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
