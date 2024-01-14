<?php 
 
$pdo = new PDO('mysql:host=localhost;dbname=aulas', 'root','');
// mostra erros
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// INNER no lugar de LEFT so iria retornar quem realmente tem um cargo
$query = "SELECT *  FROM `clientes` LEFT JOIN `cargos` ON `clientes`.`cargo` =`cargos`. `id`";

 $sql = $pdo->prepare($query);
 $sql->execute();
 $clientes = $sql->fetchAll();

foreach($clientes as $key => $value){
  echo $value['nome'];
  echo ' | ';
  echo $value['nome_cargo'];
  echo '<br>';
}
 
?>