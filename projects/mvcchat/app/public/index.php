<?php

require_once '../core/Router.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/AboutController.php';

// Initialize Router
$router = new Router();

// Define routes
$router->get('/', 'HomeController@index');
$router->get('/home', 'HomeController@index');
$router->get('/about', 'AboutController@index');

// Handle the request
$router->run();
?>
