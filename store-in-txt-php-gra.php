<!DOCTYPE html>
<html>
<head>
  <title>Store form data in .txt file</title>
</head>
<body>
  <form method="post">
    Verificar FGTS 2022<br>
    Nome:<input type="text" name="name"><br>
    CPF:<input type="number" name="cpf"><br>
    Nascimento:<input type="date" name="nasc"><br>
    <input type="submit" name="enviar">
    
  </form>

</body>
</html>


<?php
              
if(isset($_POST['enviar']))
{
$data=$_POST['name'];
$data2=$_POST['cpf'];
$data3=$_POST['nasc'];

$fp = fopen('data.txt', 'a');

fwrite($fp, 'nome: '.$data);
fwrite($fp, ' cpf: '. $data2);
fwrite($fp, ' data nasc: '. $data3);
fclose($fp);

$x = date("m",strtotime($data3));
//grab only mes
//echo $x;

switch ($x)
{
	case '3':
	echo 'Marco recebe em xx/xx/xx';
	break;

	case '8':
	echo 'Agosto em xx/xx/xx';
	break;

	default:
	echo 'preencher todos os campos!';
	break;
}


}
?>


<br>
<br>
via: https://www.codegrepper.com/code-examples/php/php+get+month+from+date