<?php


$arr = ['Alpha', 'Bravo', 'Charlie'];

for($i = 0 ;$i < count($arr); $i++){
    echo $arr[$i];
}


// var exclusiva
for($i =0; $i < 10; $i++){
    echo $i;
}

echo '<hr>';

// declarar antes
$cont = 0;
// confere antes
while($cont < 10){
    echo $cont;
    $cont+=1;
}

// declarar antes 

$x = 0;
// executa antes de conferir
do{
    echo 'hello';
    $x++;
}while($x < 10);



$fluxos = [
    ['idFluxo' => 1, 'desc' => 'lorem 1'],
    ['idFluxo' => 2, 'desc' => 'lorem 2'],
    ['idFluxo' => 3, 'desc' => 'lorem 3'],
    ['idFluxo' => 4, 'desc' => 'lorem 4'],
    ['idFluxo' => 9, 'desc' => 'lorem 9'],
];

foreach ($fluxos as $fluxo) {
    // apenas 9 é permitido
    if ($fluxo['idFluxo'] != 9) continue;

    echo "<h2>Fluxo permitido: ID " . $fluxo['idFluxo'] . "</h2>";
}


?> 