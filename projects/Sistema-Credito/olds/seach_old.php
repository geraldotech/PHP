<?php
$user = "lucy";
$password = "lucy";
$database = "Users";
$table = "cadastros";
global $usersearch;

//$conn = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
$conn = mysqli_connect("localhost", $user, $password, $database);

// Check connection 
if (mysqli_connect_errno()) { 
  echo "Database connection failed."; 
} 

if(isset($_POST['search'])){
  $usersearch = $_POST['Username'];
  //$qry  = mysqli_query($conn, "SELECT * FROM cadastros WHERE NOME like '%GERALDO%'");
}
   $qry = mysqli_query($conn, "SELECT * FROM cadastros WHERE NOME like '%$usersearch%'");

if(isset($_POST['clean'])){
  $qry = mysqli_query($conn, "SELECT * FROM cadastros WHERE NOME like '%$usersearch%'");
}

?>
<html>
  <head>
  <title>Lista e Filtro</title>
<link rel="stylesheet" href="./assets/styles.css" />
</head>
<body>
<h1>Filtro por nome</h1>

<form method="POST">
  <input type="text" name="Username"  placeholder="Busca por nome" >
  <input type="submit" name="search" value="Buscar"/>
  <input type="reset" name="reset"  value="Reset input" />
  <input type="submit" name="clean" value="Limpar filtro" />
 <!--  <button name="clean">Limpar filtro</button> -->
</form>
<section>
<table>
  <caption>Registro</title>
  <tr> 
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>CPF</th>
    <th>LIMITE</th>
    <th>CLIENTE DESDE</th>
    <th>EDITAR</th>
  </tr>
  <?php 
  while($result = mysqli_fetch_array($qry)){
  ?>
<tr>
    <td><?php echo $result['person_id']; ?></td>
    <td><?php echo $result['NOME']; ?></td>
    <td><?php echo $result['EMAIL']; ?></td>
    <td><?php echo $result['CPF']; ?></td>
    <td>R$ <?php echo $result['LIMITE']; ?></td>
    <td><?php echo $result['CLIENTE_DESDE']; ?></td>
    <td> <?php echo '<a href = "editar.php?userid='.$result['person_id'].'">'.'Editar: '.$result['person_id'].'</a><br/>';  ?> </td>    
  </tr>
  
<?php
}
  mysqli_close($conn); 
  ?>

<table>
</section>
<?php
include('footer.php')
?>
</body>
</html>