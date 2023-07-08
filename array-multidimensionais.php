<?php
#multidimensional array

$compras = array(array('agua','refri'),array('1','2'));
$produtos = ['BEBIDAS' => ['guarana','limao','cerveja',],'CARNES' =>['alcatra',' ACEM']];



//MOSTRA TODOS os itens mas sem chave
//echo 'LISTA => ';
array_walk_recursive($produtos, function ($item, $key) {
 //  echo "$key $item\n";
});



//print itens by id
//echo $produtos['BEBIDAS'][0];


//mostrar all arrays chaves and index
//print_r($produtos);


//mostra o index de cada categoria

foreach ($produtos as $mdaKey => $mdaData) {
 //   echo $mdaKey . ": " . $mdaData[1];
}


//mostra todos os itens de uma categoria especifica
for ($i = 0 ; $i < count($produtos['BEBIDAS']); $i++) {
  //  echo $produtos['BEBIDAS'][$i].'<br/>';
}






?>