<?php 
 
$pdo = new PDO('mysql:host=localhost;dbname=aulas', 'root','');
//$query = "SELECT *  FROM `clientes`  GROUP by cargo LIMIT 1";
$query = "SELECT *  FROM `clientes` GROUP by cargo ORDER BY nome ASC";
 $sql = $pdo->prepare($query);
 $sql->execute();
 $clientes = $sql->fetchAll();

foreach($clientes as $key => $value){
  echo $value['nome'];
  echo '<br>';
}
 
?>