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

<h1 style="text-align:center">Calculadora de soma</h1>
<form method="post">
	<input type="text" name="numero1" />
	+
	<input type="text" name="numero2" />
	<input type="submit" name="acao" value="Calcular" />
</form>

<?php

$res = '<h3 style="color: green">Resultado</h3>';;

 	if(isset($_POST['acao'])){
 	echo $res; echo  $_POST['numero1'] + $_POST['numero2'];

}

?>
</body>
</html>