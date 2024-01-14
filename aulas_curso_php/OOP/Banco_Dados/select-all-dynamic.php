<?php 

$pdo = new PDO('mysql:host=localhost;dbname=modulo_8', 'root','');

$sql = $pdo->prepare("SELECT * FROM posts WHERE categoria_id = ?"); 

$sql->execute(array($_GET['categoria_id']));

//✅✅ now you can http://localhost/local/aulas_curso_php/Usando_PDO_criando_banco/select-all-dynamic.php?categoria_id=1

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

?> 
