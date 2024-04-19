<?php 
  class ClassName {
    const VALOR = 300;
    public function __construct(){
      echo self::VALOR;
    }
  }

  //new ClassName;


  // or
  echo ClassName::VALOR;
?>