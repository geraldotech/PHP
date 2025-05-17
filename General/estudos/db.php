<?php

// Exemplo básico de conexão
$dsn = "mysql:host=db;dbname=movies";
$user = "root";
$pass = "root";

try {

  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
  echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
