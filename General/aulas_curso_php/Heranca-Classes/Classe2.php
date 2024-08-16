<?php 
 
class Registro {

  public $nome;
  public $idade = 30;


  public function meusDados(){
    return "Meu nome é Geraldo eu tenho $this->idade";
  }

  public function showdados(){
    return $this->meusDados();
  }

}

$gel = new Registro();
echo $gel->showdados();


?>