<?php 

// Obtém o timestamp atual
$timestamp = date('Ymd_His'); // Formato: '20240927_153000'

// Define o nome do arquivo com o timestamp
$filename = "teste_$timestamp.txt";

// Escreve no arquivo
file_put_contents($filename, "Este arquivo foi criado em: $timestamp\n");

// Confirmação de que o arquivo foi criado
echo "Arquivo '$filename' criado com sucesso!";

?> 


