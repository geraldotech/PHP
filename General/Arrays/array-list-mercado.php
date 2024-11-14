<?php

$mercado = ['Bebidas'=>'vinho tinto, cerveja,  refrigerante <hr>','Higiene'=>'esponja','sabonete'];

$papelaria = array('livros',' canetas',' lapis',' papel oficio');


#percorrer array
foreach ($mercado as $key => $value) {
	echo $key;
	echo '=>';
	echo $value;
	
}



?>