<?php

class Pessoa {
  // attributos e methodos
   public $nome;
   public $idade = 32;

   public function meusDados(){
    return "Meu nome é Geraldo, eu tenho $this->idade anos.";
   }

   public function dadosPessoa(){
    //$this->$nome;
    return $this->meusDados();
   }

}

$pessoa = new Pessoa();
echo $pessoa->dadosPessoa();