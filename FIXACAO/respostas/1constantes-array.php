<?php
$sucesso[0] = ['chave1'=>'<h1>SO SUCESSO!</h1>'];
$teclado = array ('n1','n2','n3');
define('NOME','GERALDO');
define('NOME2','GERALDO');

if (NOME == NOME2){
	echo $sucesso[0]['chave1'];
	echo '<hr>';
	echo $teclado[2];
}
 else {
 	echo 'DIFERENTES@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@';
 }

?>