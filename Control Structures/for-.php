<?php
//tem variavel exclusiva

$name = 'geraldo';
	for($contador=0;$contador<=10;$contador++){
		echo '<hr>';
		echo "Geraldo $contador";
		/*echo 'Geraldo' .$contador;*/
	}

echo '<hr>';


$x = 5;
$cont;

for($cont=1;$cont<=10;$cont++)
{
echo '<br />';
$res = $cont * $x;
echo "$x * $cont = $res";

echo '<hr>';
echo '<br />';
echo ''.$x.' * '.$cont;
}

echo '<hr>';

$x = 5;
for ($cont=1;$cont<=10;$cont++) {
	echo '<br />';
	echo "$x x $cont = ";
	echo $x * $cont;
}
	




?>