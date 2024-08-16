<?php 
 
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