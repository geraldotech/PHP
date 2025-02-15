<?php
/* 
MVC
Model
View
Controller
*/


$autoload = function($class){
  if($class == 'Email'){
    include('phpmailer/PHPMailerAutoLoader');
  }
  include($class.'.php');
};

spl_autoload_register($autoload);

$app = new Application();
$app->executar();
?>