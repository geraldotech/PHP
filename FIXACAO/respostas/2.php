<?php

$nome = "GERALDO ";
$city = " DUQUE DE CAXIAS";
$distrito = " RUA PARANAPIACABA N: 130";


echo "$nome mora na $city <br>";
echo $nome . " mora na " . $distrito . " em " . $city;
echo "<br />";
echo $city . "<br>";
echo $nome . $city;


echo "<hr>";

if ($nome == $city) {
	echo "sao diferentes";
} else
echo "sao iguais";


?>