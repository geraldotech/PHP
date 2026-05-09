<?php
// session_save_path('tmp');
date_default_timezone_set('America/Sao_Paulo');
session_start();
require 'config.php';
ini_set('memory_limit', '-1');
// Reporta todos os erros
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(0);
set_time_limit(50000000);

// Reporta apenas erros fatais, noticias e erros de compilação
// ini_set('display_errors',1); ini_set('display_startup_erros',1); error_reporting(E_ERROR | E_PARSE | E_NOTICE);
spl_autoload_register(function ($class) {
        $directories = ['controllers', 'models', 'core', 'regrasform', 'helper'];

        foreach ($directories as $directory) {
                $file = $directory . '/' . $class . '.php';

                if (file_exists($file)) {
                        require_once $file;
                        return;
                }
        }
});

$core = new Core();
$core->run();
