<?php 
 include('site.php');

 $foo = new WebsiteTemplate();
  
?>
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New document</title>
</head>
<body>
  <h1> Contextualizando templates com classes</h1>
  
<aside>  <?=  WebsiteTemplate::aside(); ?></aside>


  <?= $foo->footer ?>
</body>
</html>