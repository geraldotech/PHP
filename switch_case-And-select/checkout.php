<!DOCTYPE html>
<html>
<body>
<form method="post">
  Color:<input type="text" name="nome" >
  <input type="submit" name="acao" value="Confirmar" />
</form>
<?php
$nome = 'ola';
if (isset($_POST['acao'])){
  $nome = $_POST['nome'];
}

switch ($nome) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  case "ola":
    echo "";
    break;
  default:
    echo "NOT FOUND!";
}
?>
 
</body>
</html>
