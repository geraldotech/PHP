<!-- thanks //https://acervolima.com/php-funcao-mysqli_fetch_array/ -->

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
<table>
  <caption>Registro</title>
  <tr> 
    <th>NOME</th>
    <th>CPF</th>
  </tr>
 
  <?php 
  while($result = mysqli_fetch_array($qry)){
  echo"  
  <tr><td>" . $result['NOME'] ."</td></tr>";
};
  mysqli_close($conn);
  ?>
  
<table>

</body>
</html>