<?php
$nome = 'ola';
if (isset($_POST['acao'])){
  $nome = $_POST['nome'];
}

switch ($nome) {
  case "red":
    $res = "Your favorite color is red!";
    break;
  case "blue":
    $res = "Your favorite color is blue!";
    break;
  case "green":
    $res = "Your favorite color is green!";
    break;
  case "ola":
    $res = "";
    break;
  default:
    //echo "NOT FOUND!";
    $res = "Not Found!";
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post">
  N1:<input type="text" name="nome" >
  <input type="submit" name="acao" value="Confirmar" />  
</form>
<p><?php echo $res ?></p>

 
</body>
</html>
