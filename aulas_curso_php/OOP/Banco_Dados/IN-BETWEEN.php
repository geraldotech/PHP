<?php 
$pdo = new PDO('mysql:host=localhost;dbname=aulas', 'root','');

 //$query = "SELECT * FROM `clientes` WHERE id IN (1,2,3)";
 $query = "SELECT * FROM `clientes` WHERE id ";

 //between é ideal para datas, consultar a video aula para criar uma 
 $sql = $pdo->prepare($query);
 $sql->execute();

 $emails = $sql->fetchAll(); 
 print_r($emails);

 
?>