<?php 
date_default_timezone_set('America/Sao_Paulo');

  $pdo = new PDO('mysql:host=localhost;dbname=modulo_8', 'root','');
  $id = 1;

 
  // nunca esquecer o WHERE... 😶‍🌫️
  $sql = $pdo->prepare("UPDATE `clientes` SET nome='Geraldo', sobrenome='Costa' WHERE nome = 'Mario' AND sobrenome = 'da Silva'"); 
  // tbm existe o OR - funciona como ou 

  if($sql->execute()){
    echo 'cliente atualizado com sucesso!';
  }
 
?> 