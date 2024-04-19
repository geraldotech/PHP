<?php 
 // serve para para classes
 
 
 // mais organizado, function movida para config.php
 include('config.php');
/* function myautoload($class){
  if(file_exists('classes/'.$class.'.php')){
    include('classes/'.$class.'.php');
  }
}

spl_autoload_register('myautoload'); */

new Utilidades();


?> 
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New document</title>
</head>
<body>
  <?php new Home\Inicial();  ?>
</body>
</html>