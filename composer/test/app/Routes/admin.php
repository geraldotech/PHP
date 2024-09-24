<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addGroup('/admin', function (RouteCollector $r) {
        $r->addRoute('GET', '/dashboard', [\App\Controllers\AdminController::class, 'dashboard']);
        $r->addRoute('GET', '/users', [\App\Controllers\AdminController::class, 'listUsers']);
    });
};
