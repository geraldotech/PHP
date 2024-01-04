<?php

//condicao 1
$a = 10;
$b = 2;
echo $a/$b == 5 ? "resultado cinco" : "resultado nao e cinco";

echo '<br><hr>';
//condicao 2
$sucess = 'HOJE DIA QUINZE';
$dia = 15;
$res = $dia == 15 ? "quinze" : "nao quinze";
echo $res;
//condicao 3
echo '<br><hr>';
$dia = date('d');
$x = $dia == 15 ? 'hoje dia quinze' : 'hoje nao dia quinze';
echo $x;

?>