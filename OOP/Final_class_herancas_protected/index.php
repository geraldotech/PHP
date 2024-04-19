<?php 
 
  class Children {

    protected function protegida(){
      echo 'chamando funcao protegida';
    }

    public function prinHello(){
      echo 'Hello World';
    }
 }

 class Pai extends Children{
  public function showHello(){
    echo "Good-bye World";
    echo '<br>';
    $this->protegida();
  }
 }

 $pai = new Pai;
 $pai->showHello();

 $children = new Children;
 $children->prinHello();
 
?>