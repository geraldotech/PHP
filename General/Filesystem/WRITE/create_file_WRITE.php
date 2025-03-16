<?php 


$fp = fopen('file.txt', 'a');


$data = date('d-M-Y H:i:s') . " Hello";

if(fwrite($fp, "$data \n")){
  echo 'sucesso';
}
fclose($fp);
?>