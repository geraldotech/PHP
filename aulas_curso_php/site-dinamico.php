<?php
	$paginas = ['home'=>'Minha home','sobre'=>'estou no sobre','contato'=>'contact page','FAQ'=>'PERGUNTAS AQUI'];
	$paginas ['contato']= 'meu contato page2';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Site Dinamico</title>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		header{
			background-color: #069;
			padding: 8x 10px;
			text-align: center;
		}
		a {
			display: inline-block;
			margin: 0 10px;
			font-size: 17px;
			color: white;
			text-decoration: none;
		}
	</style>
<body>
	<header>
		<?php
		foreach ($paginas as $key => $value) {
			echo '<a href="?page='.$key.'">'.ucfirst($key).'</a>';
		}


		?>
	</header>
<section>
	<h2> 
<?php

	$pagina = (isset($_GET['page']) ? $_GET['page'] : 'home');
	if (!array_key_exists($pagina, $paginas)){
		$pagina = 'home';
	}

	echo ucfirst($pagina);

?>	</h2>
	<p><?php echo $paginas[$pagina]; ?></p>
</section>
</body>
</html>