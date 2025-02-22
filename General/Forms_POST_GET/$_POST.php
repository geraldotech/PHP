<?php
// captura tudo de $_POST se foi setado
if(isset($_POST)){
  print_r($_POST);
}


if($_SERVER['REQUEST_METHOD'] !== 'POST'){
  header('Content-Type:application/json');
  echo json_encode('the endpoint only accepts post requests. received a get request'); return;
}


// se $_POST é vazio, nao é possivel 
if(empty($_POST)):
  echo 'necessario enviar $_POST';
 return; // retorna
endif;




if(10 > 5) :
  echo 'false';
 // return; // 1.1 block resto do código
endif;

?>

<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <form action="" method="POST">
    <input type="text" name='name'>
    <input type="text" name='age'>
    <input type="submit" name='action' value="Enviar">
  </form>
</body>
</html>