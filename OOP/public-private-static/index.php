<?php 
 include('exemplo.class.php');
 // instancia de objeto 1
  $exemplo = new Exemplo();
  echo $exemplo->var2 = 'ola';


  // outra instancia de objeto 2
  $exemplo2 = new Exemplo();
  echo $exemplo2->var2;
  echo '<br>';
  echo $exemplo2->metodo();
  echo '<br>';

  // call static 
  //Exemplo::$var3 = 'outra variavel static';
  echo Exemplo::$var3;

  echo '<br>';
  Exemplo::funcaoStatic();
  echo '<br>';
  
  // functios parametros
  $exemploy = new Exemplo();
  $exemploy->setVar('Geraldo');
  echo  $exemploy->pegaVar1();
  
  echo '<br>';

  $exemploz = new Exemplo();
  $exemploz->setVar("Felipe");
  echo $exemploz->pegaVar1();


?> 
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New document</title>
</head>
<body>
  
</body>
</html>