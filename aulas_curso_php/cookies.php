<?php 

setcookie('nome', 'Geraldinho', time() + (60 + 60 *24), '/');

echo $_COOKIE['nome'];
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