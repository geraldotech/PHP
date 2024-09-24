<?php
if(isset($_POST['btn'])){
	$x = $_POST['n1'];
	$y = $_POST['n2'];
	$z = $x + $y;
	echo "soma = ".$z;
}
?>