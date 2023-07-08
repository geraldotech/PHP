<?php

if (isset($_POST['calc'])){
	$x = $_POST['n1'];
	$y = $_POST['n2'];
	$z = $x + $y;
	echo $x .' x '.$y . ' = '. $z;
    echo "$x";
}
?>