<?php 
 date_default_timezone_set('America/Sao_Paulo');

 $content =  "Meu novo conteudo criado pelo php\r\n line2";
 $cod_usuario = date('d:M:Y H-i-s') . ' test'; 
file_put_contents('arquivo.txt', $content);
 

/* LOG TXT SE NECESSÁRIO */
$logFile =  'nao_inseridos.txt';
file_put_contents($logFile, $cod_usuario . PHP_EOL, FILE_APPEND);
?>