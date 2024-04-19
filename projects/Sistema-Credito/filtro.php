<?php
require_once "functions.php";
$results = filterUsers($conn);


// se nao ainda nao clicou para afetuar busca
if(!isset($_POST['search'])){
  $results = listaAll($conn, $table); // a fun que lista todos on
} 
?>
<html>
  <head>
  <title>Lista e Filtro</title>
<link rel="stylesheet" href="./assets/styles.css" />
</head>
<body>
<?php

include('./layout/navbar.php')
?>
<h1>Seach by nome</h1>
<form method="POST">
  <input type="text" name="Username"  placeholder="Busca por nome" >
  <input type="submit" name="search" value="Buscar"/>
  <input type="reset" name="reset"  value="Reset input" />
  <input type="submit" name="clean" value="Limpar filtro" />
</form>
<section> 
<table>
<?php
if($results){ ?>
  <caption>Registro</title>
  <tr> 
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>CPF</th>
    <th>LIMITE</th>
    <th>CLIENTE DESDE</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>
<?php } ?>
  <?php 
  /* while($result = mysqli_fetch_array($fun)){ */
   if($results){ // only if has results do foreach  
    foreach($results as $result) {     
  ?>
<tr>
    <td><?php echo $result['person_id']; ?></td>
    <td><?php echo $result['NOME']; ?></td>
    <td><?php echo $result['EMAIL']; ?></td>
    <td><?php echo $result['CPF']; ?></td>
    <td>R$ <?php echo $result['LIMITE']; ?></td>
    <td><?php echo $result['CLIENTE_DESDE']; ?></td>

    <!-- editar e delete sao enviados params por get -->
    <td> <?php echo '<a href = "editar.php?userid='.$result['person_id'].'">'.'Edit: '.$result['person_id'].'</a>';  ?> </td>  
    <td>
     <p> <a href="delete.php?userid=<?=$result['person_id'] ?>&nome=<?=$result['NOME']?>">Delete</a>
    </p>
    </td>
  </tr>  
<?php
 }
}
  ?>
<table>
</section>
</body>
</html>