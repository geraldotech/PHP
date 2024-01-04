<?php

$peso = '87';
$altura = '1.70';

$alturam = $altura * $altura; 

$res =  $peso / $alturam;
if ($res <= 18.5){
	echo 'Voce esta abaixo do peso';
} else {
	echo 'Voce nao esta abaixo do peso!';
}


?>