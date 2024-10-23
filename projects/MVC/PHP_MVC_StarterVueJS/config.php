<?php
//Path precisa ser configurado para poder achar os arquivo de email e sincronizador//
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].':8080/' .'PHP_MVC_StarterVueJS');
define('LOG_PATH', BASE_PATH.'/logs');

define("PATH", '/PHP/projects/MVC/PHP_MVC_StarterVueJS');
define('PORT', ':8080');
define("SERVER_NAME", '127.0.0.1');
define("URL", 'http://'.SERVER_NAME.PORT . PATH);


global $config;
global $db;


/* 
$config['dbname'] = 'sga_dev2';
$config['host'] = '127.0.0.1';
$config['dbuser'] = 'root';
$config['dbpass'] = 'root';
$config['PORT'] = 3306;

try{
	$db = new PDO("mysql:dbname=".$config['dbname'].";charset=utf8;host=".$config['host'].";port=".$config['PORT'], $config['dbuser'], $config['dbpass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(EXCEPTION $e){
	die($e->getMessage());
} */