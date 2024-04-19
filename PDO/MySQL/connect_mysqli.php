<?php
//Aqui colocamos o servidor em que está o nosso banco de dados,
//no nosso exemplo é a conexão com um servidor local, portanto localhost
$servername = "localhost";
//Aqui é o nome de usuário do seu banco de dados, root é o servidor inicial
//e básico de todo servidor, mas recomenda-se não usar o usuario root e sim criar um novo usuário
$username = "root";
//Aqui colocamos a senha do usuário, por padrão o usuário root
//vem sem senha, mas é altamente recomendável criar uma senha para o usuário root,
//visto que ele é o que tem mais privilégios no servidor
$password ="";

// Create connection
//  MySQLi, que suporta apenas MySQL.
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>