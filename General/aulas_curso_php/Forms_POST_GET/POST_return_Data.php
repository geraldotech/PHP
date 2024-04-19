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
	$wpp = $_POST['wpp'];
	echo ($nome);
	echo $email;
	echo $wpp;

}
?>
<form method="post">
	Nome:<input type="text" name="nome" > <br>
	Email:<input type="text" name="email" /> <br>
	Whats:<input type="text" name="wpp" /> <br>
	<input type="submit" name="acao" value="Enviar" />
</form>
</body>
</html>