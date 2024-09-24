<?php

require '../vendor/autoload.php';

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;

// Inicializa o roteamento
$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {

    // Carrega o arquivo principal de rotas
    $routeDefinitions = require __DIR__ . '/../app/Routes/web.php';
    
    // Executa o retorno da função de rotas
    if (is_callable($routeDefinitions)) {
        $routeDefinitions($r);
    }
});

// Obtém a URL e o método HTTP
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Limpa a query string (se existir) da URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Despacha a rota correspondente
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        // Exibe uma página 404
        echo "404 - Página não encontrada!";
        break;

    case Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // Exibe uma mensagem de método não permitido
        echo "Método não permitido! Permitidos: " . implode(', ', $allowedMethods);
        break;

    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$controller, $method] = $handler;

        // Verifica se a classe do controlador e o método existem
        if (class_exists($controller) && method_exists($controller, $method)) {
            // Instancia o controlador e chama o método passando variáveis
            (new $controller())->$method($vars);
        } else {
            echo "Erro: Controlador ou método não encontrado!";
        }
        break;
}
