<?php
/*CONCATENACAO, VARIAVEIS, CONTANTES E ASPAS DUPLAS*/

$name = 'GERALDO';
$surname = ' FILHO';

define ('ESTADO','RIO DE JANEIRO');


echo 'Meu nome:  '.$name.' PETRONILO';
echo '<br />';
echo '<br>';
echo 'Eu estou no estado do '.ESTADO.' atualmente';
echo '<br>';


/*JUSTANDO 2 VARIAVEIS*/
echo $name . $surname;
echo '<br />';
echo '<br>';

/*ASPAS DUPLAS COM VARIAVEL DENTRO*/
echo "Meu nome e $name";