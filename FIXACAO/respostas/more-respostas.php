<?php
//5)

$n1 = 5;
$n2 = 8;

$x = $n1*$n2 == 41 ? 'sim' : 'nao';
echo $x;

//or
echo $n1*$n2 == 41 ? 'sim' : 'nao';


//6
<form method="post">

N1:<input type="number" name="n1"><br>
N2:<input type="number" name="n2"/><br>
<input type="submit" name="calc" value="Confirmar">

</form>

#<?php

if (isset($_POST['calc'])){
	$x = $_POST['n1'];
	$y = $_POST['n2'];
	$z = $x + $y;
	echo $x .' x '.$y . ' = '. $z;
}
#?>

//7

if (isset($_POST['calc'])){
	$x = $_POST['n1'];
	//$y = $_POST['n2'];
	if ($x %2 == 0){
		echo $x.' = par';
	} else {
		echo $x.' = impar';
	}
}


#ternario
echo $x %2 === 0 ? 'par' : 'impar';

//8










?>