<?php 
 
 $content =  "Meu novo conteudo criado pelo php\r\n line2";

file_put_contents('arquivo.txt', $content);
 

/* LOG TXT SE NECESSÁRIO */
$logFile = BASE_PATH . '/logs/erp_usuarios_grupos_nao_inseridos.txt';
file_put_contents($logFile, $cod_usuario . PHP_EOL, FILE_APPEND);
?>