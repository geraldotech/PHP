<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

if (isset($_POST['acao'])){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	echo "Os dados digitados foram:";
	echo '<br />';
	echo ($nome);
	echo '<br />';
	echo $email;
}
?>
<form method="post">
	<input type="text" name="nome" />
	<input type="text" name="email" />
	<input type="submit" name="acao" value="Enviar" />
</form>
</body>
</html>