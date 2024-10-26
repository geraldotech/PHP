<?php

// porta do Docker
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']. ':8080/' . 'PHP_MVC_Starter-DEV-Tests');
define('LOG_PATH', BASE_PATH.'/logs');
define("SYS_EMAIL_ADMIN", 'gmapdev@geraldox.com');

//define("URL", 'http://php.localhost/projects/MVC/PHP_MVC_Starter-DEV-Tests');

define("PATH", ':8080/PHP/projects/MVC/PHP_MVC_Starter-DEV-Tests');
define("SERVER_NAME", '127.0.0.1');
define("URL", 'http://'.SERVER_NAME.PATH);


global $config;
global $db;

/** cumprimento - horario **/
if (date('H') < 12)     { $cumprimento = "Bom dia";     }
elseif (date('H') < 18) { $cumprimento = "Boa tarde";   }
else                    { $cumprimento = "Boa noite";   }


/* BANCO DE DADOS */
define("DB_DATABASE",   "logins");
define("DB_HOST",       "db"); // docker host
define("DB_USER",       "root");
define("DB_PASSWORD",   "root");
define("DB_PORT",       "3306");



/**
 * PDO - CONEXAO COM BANCO DE DADOS
 */

try{
	$db = new PDO("mysql:dbname=".DB_DATABASE.";charset=utf8;host=".DB_HOST.";port=".DB_PORT, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(EXCEPTION $e){
	die($e->getMessage());
} 