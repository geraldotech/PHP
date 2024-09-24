<form method="post">
<select name="opt">
<option value="">Select</option>
<option value="sum">img 1</option>
<option value="mul">img 2</option>
</select>

<input type="submit" name="calc" value="Calcular">


</form>

<?php


if(isset($_POST['calc'])){
	$opt = $_POST['opt'];

	if($opt === 'sum'){
		echo '<img src="https://" style="width:50%" />';
	} else if ($opt === 'mul'){
		echo '<img src="https://" style="width:50%" />';
	}
	
}

?>