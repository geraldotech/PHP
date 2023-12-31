<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

if (isset($_POST['acao'])){
	echo $_POST ['nome'];
}

?>
<form method="post">
	<select name="nome">
		<option value="Geraldo Petronilo Costa Filho">Geraldo</option>
		<option value="1">um </option>
		<option value="2">two </option>
		<option value="3">tres </option>
	<input type="submit" name="acao" value="Enviar" />
	</select>	
</form>

</body>
</html>