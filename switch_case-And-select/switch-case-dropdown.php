<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
<body>
	<center>
		<h1>
<form method = "post">
	<select name = "dropdown" , value = "select">
		<option value = "select">  select  </option>
		<option value = "tim">  TIM  </option>
		<option value = "vivo">   VIVO   </option>
		<option value = "claro"> CLARO </option>
	</select>
	<input type = "submit", name = "submit" , value = "submit">
</form>
	
		<?php
		if ($_POST)
		{
			$x = $_POST['dropdown'];
			switch($x)  
			{ 

			case "tim": echo "sem fronteiras";
			break;

			case "vivo": echo "vivo fibra";
			break;

			case "claro": echo 'claro ultra <br><a href="https://www.youtube.com/watch?v=nmjO1p9Oxrk" style="color:red;font-size:17px;">download </a>';
			break;

			default: echo "Input did not match with any case";

			  }
		}
		?> 
	</h1> </center>	
</body>