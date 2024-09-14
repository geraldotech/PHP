<?php

require_once 'vendor/autoload.php';

use FastRoute\RouteCollector;

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    // Definindo rotas
    $r->addRoute('GET', '/', function() {
        echo 'Página inicial';
    });

    $r->addRoute('GET', '/sobre', function() {
        echo 'Sobre nós';
    });

    $r->addRoute('GET', '/usuario/{id:\d+}', function($vars) {
        echo "Exibindo o usuário com ID: " . $vars['id'];
    });

    // Adicione mais rotas conforme necessário
});

// Coleta as informações da requisição
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Remove a query string da URI (se houver)
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Despacha a rota
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // Rota não encontrada
        echo '404 - Página não encontrada';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // Método HTTP não permitido
        $allowedMethods = $routeInfo[1];
        echo 'Método não permitido. Use: ' . implode(', ', $allowedMethods);
        break;
    case FastRoute\Dispatcher::FOUND:
        // Rota encontrada
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        if (is_callable($handler)) {
            call_user_func($handler, $vars);
        } else {
            echo 'Erro ao processar a rota.';
        }
        break;
}
