<?php 
 date_default_timezone_set('America/Sao_Paulo');

 $content =  "Meu novo conteudo criado pelo php\r\n line2";
 $cod_usuario = date('d:M:Y H-i-s') . ' ok'; 
file_put_contents('arquivo.txt', $content);
 

/* LOG TXT SE NECESSÁRIO */
$logFile =  'create_file_put_contents_log.txt';
$ret = file_put_contents($logFile, $cod_usuario . PHP_EOL, FILE_APPEND);

if($ret){
  echo json_encode([
    'ok' => true,
    'message' => 'success'
  ]);
}
?>