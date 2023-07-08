<form method="POST">

N1: <input type="number" name="n1"><br>
N2: <input type="number" name="n2"><br>
<select name="opt">
	<option value="1">Selecionar</option>
	<option value="+">soma</option>
	<option value="-">sub</option>
	<option value="*">mult</option>
	<option value="/">div</option>

<input type="submit" name="calc" value="Enviar">

	</form>
<br>
<button onclick="location.reload()">Location.reload</button>
<?php
if(isset($_POST['calc'])){
	$n1 = $_POST['n1'];
	$n2 = $_POST['n2'];
	$opt = $_POST['opt'];
	}

	if($opt == '+' )
	{
		echo $n1 + $n2;
	} else if ($opt == '-'){
		echo $n1 - $n2;
	} else if ($opt == '*'){
		echo $n1 * $n2;
	} else if ($opt == '/'){
		echo $n1 / $n2;
	} else {
		echo '';
	}


?>