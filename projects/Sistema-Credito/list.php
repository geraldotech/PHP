<!-- thanks //https://acervolima.com/php-funcao-mysqli_fetch_array/ -->
<?php
require_once "functions.php";
$usuarios = listaAll($conn, $table);
?>
<html>
  <head>
  <title>Cadastros</title>
<link rel="stylesheet" href="./assets/styles.css" />
</head>
<body>
<?php include('./layout/navbar.php'); ?>
<h1>Todos os cadastros </h1>
<table>
  <caption>Registro</title>
  <tr> 
    <th>NOME</th>
    <th>EMAIL</th>
    <th>CPF</th>
    <th>LIMITE</th>
    <th>CLIENTE DESDE</th>
    <th>Editar</th>
  </tr>
  <tr>
  <?php
foreach($usuarios as $usuario){ ?>
    <td><?php echo $usuario['NOME']; ?></td>
    <td><?php echo $usuario['EMAIL']; ?></td>
    <td><?php echo $usuario['CPF']; ?></td>
    <td>R$ <?php echo $usuario['LIMITE']; ?></td>
    <td><?php echo $usuario['CLIENTE_DESDE']; ?></td>
    <td><p class="edit"><a href="editar.php?userid=<?php echo $usuario['person_id']  ?>">X</a></p></td>
  </tr>
<?php 
}
?>
<table>
</body>
</html>