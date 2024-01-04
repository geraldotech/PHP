<?php

define('INCLUDE_PATH', 'http://localhost/local/aulas_curso_php/MVC_e_Rotas/');
define('INCLUDE_PATH_FULL','http://localhost/local/aulas_curso_php/MVC_e_Rotas/Views/pages/');

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
      die('nao existe esse controller');
    }
  }
}

?>


