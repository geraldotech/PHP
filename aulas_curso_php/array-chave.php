<?php
//Array
//modo 1
$opcoes[0] = ['chave1'=>'geraldo','isabella'];

//modo 2
$opcoes[100] = array('chave2'=>'master','chave3'=>'freitas');

//modo 3
$opcoes[5]['cha1'] = '<h1>domingo</h1>';

echo $opcoes[0]['chave1'];
echo '<br />';
echo $opcoes[100]['chave3'];

?>