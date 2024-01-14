<?php 
date_default_timezone_set('America/Sao_Paulo');

  $pdo = new PDO('mysql:host=localhost;dbname=modulo_8', 'root','');


  if(isset($_POST['acao'])){
    
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $registroem = date('Y-m-d H:i:s');
 
  $sql = $pdo->prepare("INSERT INTO `clientes` VALUES (null, ?, ?, ?)"); 
 
  $sql->execute([$nome, $sobrenome, $registroem]);
  echo 'Cliente inserido com sucesso!';
  }
?> 
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
  <h1>hello</h1>
<form action="" method="post">
  <input type="text" name="nome" required />
  <input type="text" name="sobrenome" required />
  <input type="submit" value="Enviar" name="acao" />
</form>

</body>
</html>