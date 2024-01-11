<?php 

// public funcion em qualquer lugar
// Private só conseguimos acessar dentro da class


 class Exemplo {
  private $var1;
  public $var2 = '';
  public static $var3 = 'static var';
  public $customname = 'Filho';


  // mesmo coisa public e private para os methods
  
public function metodo(){
  echo "methodo()";
  
}

private function metodo2(){
  echo "methodo2()";
}

public static function funcaoStatic(){
  echo 'static function';
}

public function setVar($num){
   $this->var1 = $num;

}

public function pegaVar1(){
  return $this->var1;
}


 }
?>