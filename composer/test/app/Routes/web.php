<?php

use FastRoute\RouteCollector;

// Função principal de roteamento
return function (RouteCollector $r) {

    // Inclui outros arquivos de rotas, exceto o próprio web.php
    foreach (glob(__DIR__ . '/*.php') as $routeFile) {
        if (basename($routeFile) !== 'web.php') {
            require $routeFile;
        }
    }

    // Aqui você pode definir as rotas principais que sempre devem estar presentes
    $r->addRoute('GET', '/', [\App\Controllers\HomeController::class, 'index']);
    $r->addRoute('GET', '/about', [\App\Controllers\AboutController::class, 'index']);
};
