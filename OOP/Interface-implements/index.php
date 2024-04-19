<?php 
include('Interface.php');

class Test implements Interface1 {

  public function PrintonScreen($par){
    echo $par;
  }
}


$test = new Test;


$test->PrintonScreen('Hello World')


?>