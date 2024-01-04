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
}while($x < 10)


?>