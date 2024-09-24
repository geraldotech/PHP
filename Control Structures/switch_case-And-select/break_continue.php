<?php 
 $nome = 'Geraldo';
switch($nome){
    case 'Geraldxo':
        echo 'var is Geraldo';
        break;
    case 'fe':
        echo 'var is fe';
        break;
        default:
        echo 'not found!';
}

print_r('<hr>');

// break para loop: for, while, do, foreach e switch

for($i = 0; $i < 10; $i++){
    echo $i;
    if($i == 5)
        break; // stop loop    
}

// continue para loop: for, while, do and foreach
for($i = 10; $i < 20; $i++){ 
    if($i == 15 && $i == 20)
        continue; // skip 15 and 20
    echo "<li>$i</li>";
    echo '<br>';
}
