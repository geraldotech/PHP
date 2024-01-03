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
	 </style>
</head>
<body>
<?php 
 
 $sum = null;
 if(isset($_POST['acao'])){
	 $sum = (float)$_POST['numero1'] + (float)$_POST['numero2'];

}

?>
<h1 style="text-align:center">Calculadora de soma</h1>
<form method="post">
	<input type="text" name="numero1" />	+
	<input type="text" name="numero2" />
	<input type="submit" name="acao" value="Calcular" />
	<input type="reset" value="Reset" />
</form>
<h1>A soma: <?= $sum ?></h1>
</body>
</html>

