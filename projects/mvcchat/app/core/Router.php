<?php

class Router
{
    private $routes = [];

    public function get($route, $action)
    {
        $this->routes['GET'][$route] = $action;
    }

    public function post($route, $action)
    {
        $this->routes['POST'][$route] = $action;
    }

    public function run()
    {
        $uri = $this->getUri();
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$method] as $route => $action) {
            if ($route === $uri) {
                $this->callAction($action);
                return;
            }
        }

        // If no route matched, show 404 page
        http_response_code(404);
        require_once '../app/views/404.php';
    }

    private function getUri()
    {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        return $uri === '' ? '/' : $uri;
    }

    private function callAction($action)
    {
        list($controller, $method) = explode('@', $action);
        $controller = new $controller();
        $controller->$method();
    }
}
?>
