<?php

define('INCLUDE_PATH', 'http://php.localhost/General/aulas_curso_php/MVC_e_Rotas/');
define('INCLUDE_PATH_FULL','http://php.localhost/General/aulas_curso_php/MVC_e_Rotas/Views/pages/');

class Application
{
  public function executar(){
    //echo 'executando';
    $url = isset($_GET['url']) ? explode('/', $_GET['url'])[0] : 'Home';
    //contato => Contato
    $url = ucfirst($url);

    $url.="Controller";
    if(file_exists("Controllers/".$url.'.php')){
      $className = 'Controllers\\'.$url;
      //echo 'estou carregado a classe: ' .$url;

      $controler = new $className;
      $controler->executar();
    } else {
      //die('<h1>nao existe esse controller</h1>');
      //echo 'estou carregado a classe: ' .$url;
      $className = 'Controllers\\page404Controller'; // Adjust to match the class name in 404Controller.php
      $controllerPath = "Controllers/404Controller.php"; // Adjust the path to NotFoundController.php
  
      if (file_exists($controllerPath)) {
          require_once $controllerPath;
          $controller = new $className;
          $controller->index();
      }
     
    }
  }
}

?>


