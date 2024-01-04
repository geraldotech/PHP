<?php 
 class Router {
  public static function rota($path, $arg){
    $url = @$_GET['url']; // adicionar @ para emitor erros, não é uma boa pratica
    if($url == $path){
      $arg();
      die();
    }
    $path = explode('/', $path);
    $url = explode('/', @$_GET['url']);
    $ok = true;
    $par = [];

    if(count($path) == count($url)){

      foreach($path as $key => $value){
        if($value == '?'){
          $par[$key] = $url[$key];
        } else if($url[$key] != $value){
          $ok = false;
          break;
        }
      }
      if($ok){
        $arg($par);
        die();
      }
    }
  }
 }
?>