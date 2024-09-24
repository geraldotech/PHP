<?php
// nao usa this
class Pessoa {

  public static $nome = "Geraldo Filho";
  // mesmo que sem public static $nome = "Geraldo Filho";

  public static function dadosPessoa(){
    return "<h1>Geraldo</h1>";
  }

}


echo Pessoa::dadosPessoa();

echo Pessoa::$nome;