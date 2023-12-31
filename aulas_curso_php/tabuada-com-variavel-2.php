<?php
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


?>