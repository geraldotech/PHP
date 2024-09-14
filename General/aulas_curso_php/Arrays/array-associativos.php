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


    echo '<hr>';

    // Arrays associativos - cada índice é associado a um valor (texto)
    $test = ['ok'=> 'filter', 'notOkay' => 'no Filter', 'sou o primeiro'];

    print_r("<p> $test[0] </p>"); // index[0] ok

    print_r("<p> {$test['ok']} </p>"); // Arrays associativos deve usar {chaves}

?>
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arrays associativos</title>
</head>
<body>
  
</body>
</html>