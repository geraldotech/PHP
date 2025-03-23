<?php 
 date_default_timezone_set('America/Sao_Paulo');

$fp = fopen('create_file_WRITE_logs.txt', 'a');


$data = date('d-M-Y H:i:s') . " Hello";

if(fwrite($fp, "$data \n")){
  echo 'sucesso';
}
fclose($fp);
?>