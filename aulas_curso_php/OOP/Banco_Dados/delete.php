<?php 

  /* $pdo = new PDO('mysql:host=localhost;dbname=modulo_8', 'root','');
  $id = 1;
 
  $sql = $pdo->prepare("DELETE FROM `clientes` where ID = $id"); 
  if($sql->execute()){
    echo 'cliente deletado com sucesso!';
  }
  */
  // protegendo contra sql injection, tbm serve para o UPDATE
  $pdo = new PDO('mysql:host=localhost;dbname=modulo_8', 'root','');
  $id = 2;
 
  $sql = $pdo->prepare("DELETE FROM `clientes` where ID = ?"); 
  if($sql->execute(array($id))){
    echo 'cliente deletado com sucesso!';
  }
 
?> 