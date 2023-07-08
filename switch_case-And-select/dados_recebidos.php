<form method="post">

Nome <input type="text" name="n1"> <br>
Whatsapp <input type="number" name="n2"> <br>
<input type="submit" name="calc" value="Calcular">
</form>

<?php


//if(isset($_POST['calc'])){
	$name= $_POST['n1'];
	$wpp = $_POST['n2'];


echo "Dados recebidos ". $name . $wpp;
//}



?>