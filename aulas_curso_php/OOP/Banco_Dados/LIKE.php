<?php 
 
 $pdo = new PDO('mysql:host=localhost;dbname=aulas', 'root','');

 $query = "SELECT * FROM `clientes` WHERE email LIKE '%g%'";
 
 $sql = $pdo->prepare($query);
 $sql->execute();

 $emails = $sql->fetchAll();
 
 print_r($emails);
 


 
?>