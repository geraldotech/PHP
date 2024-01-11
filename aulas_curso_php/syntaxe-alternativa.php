<?php 
 $nome = 'Geraldo';
 if($nome == 'Geraldo'):
  echo "Verdade";
 endif;

 $contador = 0;
 while($contador < 10):

  echo $contador;
    $contador++;
endwhile;

$arr =[1,2,3,4,5];


foreach($arr as $key => $value):
  echo $key;
endforeach;

for($i = 0 ; $i < 10; $i++):
  echo $i;
endfor;


?>