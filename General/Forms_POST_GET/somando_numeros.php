<?php 
 
 //$sum = null; // use ?? no lugar
 if(isset($_POST['acao'])){
	 $sum = (float)$_POST['numero1'] + (float)$_POST['numero2'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>calculadora</title>
	<style>
		body {
			background-color: gray;
			color: white;
			padding: 150px;
			margin-top: 20px;
			font-family: verdana;
		}
		h1{
			text-align:center;
		}
	 </style>
</head>
<body>
<h1>Calculadora de soma</h1>
<form method="POST">
	<input type="text" name="numero1" />	+
	<input type="text" name="numero2" />
	<input type="submit" name="acao" value="Calcular" />
	<input type="reset" value="Reset" />
</form>
<h1>A soma: <?= $sum ?? '' ?></h1>
</body>
</html>

