<?php 



if($_SERVER['REQUEST_METHOD'] !== 'POST'){
  header('Content-Type:application/json');
  echo json_encode('the endpoint only accepts post requests. received a get request'); return;
}


// se $_POST é vazio, nao é possivel 
if(empty($_POST)):
  echo 'necessario enviar $_POST';
 return; // retorna
endif;