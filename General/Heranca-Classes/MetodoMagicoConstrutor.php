<?php 
  /**
  * __construct is a magic method in PHP
  * and are invoked automatically by the engine. __construct is called when a class is instantiated, which is why your echo runs * immediately when you create new Pessoa("Geraldo").
  */
class Pessoa {

  public $nome = " or Felipe";

public function __construct($nome){
  // executa aqui dentro primeiro
  echo 'instanciou a classe, meu nome é '. $nome . '' .$this->nome;
}

public function meusDados(){
  return "meus dados";
}

}

$pessoa = new Pessoa("Geraldo");
echo "<br>";
echo $pessoa->meusDados();