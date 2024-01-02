
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calcular medias and functions</title>
  <style>
    html {
      font-family: Arial;
      text-align: center;
    }

    footer{
      position: fixed;
      bottom: 10px;
      margin: 0 auto;
      width: 100%;
      font-size: 17px;
    }
  </style>
</head>
<body>
<?php 
 require_once('functions.php');

$footer =  myhtml();
$retorno =  isAproved($n1 = 0, $n2 = 0);
?> 

<h1><?= $msg ?></h1>
 <form action="" method="POST">
  <input type="text" name="n1" id="" required>
  <input type="text" name="n2" id="" required>
  <input type="reset" value="reset" />
  <input type="submit" name="Enviar" value="Enviar">
 </form>
 <h1><?= $retorno ?></h1>
 <h1><?= $footer ?></h1>
  
</body>
</html>