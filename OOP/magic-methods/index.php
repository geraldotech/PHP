<?php 
 include('class1.php');

 // new instance
 $test = new Class1('Geraldo', 31);
 
 
 echo $test->getNome();
 echo $test->getIdade();
 
?> 
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New document</title>
</head>
<body>
  <h1><?= $test->html() ?></h1>
  
</body>
</html>