<?php 
 
class Heranca1 {

  public $nome = " or Felipe";

  // public function __construct($nome){
  //   // executa aqui dentro primeiro
  //   echo 'instanciou a classe, meu nome é '. $nome . '' .$this->nome;
  // }

  public function listar($tabela){
    return 'listar todos os dados da tabela'.$tabela;
  }

  public function deletar($id){
    return 'deletar o usuario '.$id;
  }


public function meusDados(){
  return "meus dados";
}

}

$pessoa = new Heranca1("Geraldo");
// echo "<br>";
echo $pessoa->meusDados();