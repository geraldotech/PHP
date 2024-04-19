<?php
$user = "lucy";
$password = "lucy";
$database = "Users";
$table = "cadastros";
$conn = mysqli_connect("localhost", $user, $password, $database);

// Check connection 
if (mysqli_connect_errno()) { 
  echo "Database connection failed."; 
} 
$query = "UPDATE cadastros set LIMITE = '50000' WHERE person_id = '1'";
$atualiza = mysqli_query($conn, $query);

if($atualiza){
echo 'Configurações salvas com sucesso!';
}else{
echo 'Erro ao salvar configurações, tente novamente';
}


?>