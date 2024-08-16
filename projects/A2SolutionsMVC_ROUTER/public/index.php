<?php
session_start();

// Configuração do banco de dados
//require_once '../config/database.php';

// Carregar o roteador
require_once '../router.php';

// Processar a rota
$router = new Router($conn);
$router->dispatch($_SERVER['REQUEST_URI']);
?>
