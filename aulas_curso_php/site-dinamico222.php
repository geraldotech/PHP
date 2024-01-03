<?php


	$paginas = ['home'=>'<p>Minha home</p>','sobre'=>'<div id="centro">estou no sobre</div>','contato'=>'contact page','IMG'=>'<center><img src="http://gpnote.tech/img/chalkartes.jpg" width="300" height="250"</center>'];
	$paginas ['contato']= '<div id="centro">meu contato page2</div>';
	$notfound = ['Geraldo','Filho','Costa'];

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
		#centro {
			/* visibility: hidden; */
			text-align: center;
			background-color: rgb(22, 19, 19);
			color: white;
			font-weight: bold;
			font-size: 18px;
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