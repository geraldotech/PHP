<?php 
/* header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type"); */
header('Content-Type: application/json');

date_default_timezone_set('America/Sao_Paulo');

 $content =  "Meu novo conteudo criado pelo php\r\n line2";
 $cod_usuario = date('d:M:Y H-i-s') . ' ok'; 
file_put_contents('arquivo.txt', $content);
 

/* LOG TXT SE NECESSÁRIO */
$logFile =  'create_file_put_contents_log.txt';
$ret = file_put_contents($logFile, $cod_usuario . PHP_EOL, FILE_APPEND);


if ($ret !== false) {
  echo json_encode(["ok" => true, "message" => "Arquivo criado com sucesso"]);
} else {
  echo json_encode(["ok" => false, "message" => "Falha ao criar o arquivo"]);
}
?>