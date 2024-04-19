<!-- thanks // https://acervolima.com/php-funcao-mysqli_fetch_array/ -->
<?php
$user = "lucy";
$password = "lucy";
$database = "Users";
$table = "cadastros";

//$conn = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
$conn = mysqli_connect("localhost", $user, $password, $database);

// Check connection 
if (mysqli_connect_errno()) { 
  echo "Database connection failed."; 
} 

$qry  = mysqli_query($conn, "SELECT * FROM cadastros");
?>
<html>
  <head>
  <title>Cadastros</title>
  <style> 
  table, th, td {
  border: 1px solid black;
}
  h1{
    color: dodgerblue;
  }
  </style>
</head>
<body>
<h1>Todos os cadastros </h1>

<h3><a href="./list-filtro.php">Fazer busca</a></h3>
<table>
  <caption>Registro</title>
  <tr> 
    <th>NOME</th>
    <th>EMAIL</th>
    <th>CPF</th>
    <th>LIMITE</th>
    <th>CLIENTE DESDE</th>
  </tr>
  <?php 
  while($result = mysqli_fetch_array($qry)){
  ?>
<tr>
    <td><?php echo $result['NOME']; ?></td>
    <td><?php echo $result['EMAIL']; ?></td>
    <td><?php echo $result['CPF']; ?></td>
    <td><?php echo $result['LIMITE']; ?></td>
    <td><?php echo $result['CLIENTE_DESDE']; ?></td>
  </tr>
  
<?php
};
  mysqli_close($conn); 
  ?>

<table>

</body>
</html>