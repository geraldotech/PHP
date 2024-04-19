<?php 

$pdo = new PDO('mysql:host=localhost;dbname=modulo_8', 'root','');

$sql = $pdo->prepare("SELECT * FROM posts"); 

// only category?
// $sql = $pdo->prepare("SELECT * FROM posts WHERE categoria_id = 2"); 

$sql->execute();

$info = $sql->fetchAll();

// print all
/* echo '<pre>';
print_r($info);
echo '</pre>'; */

// print all with foreach
 foreach($info as $key => $value){
  echo 'Titulo: '. $value['titulo'];
  echo '<br>';
  echo 'Noticia: '.$value['conteudo'];
  echo '<hr>';
}
 

// print all with for


?> 
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<!-- <form action="" method="post">
  <input type="text" name="nome" required />
  <input type="text" name="sobrenome" required />
  <input type="submit" value="Enviar" name="acao" />
</form> -->
  
</body>
</html>